<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Helpers\CustomNumberHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AssessmentRequest;
use Illuminate\Support\Facades\Redirect;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // $assessments = Assessment::paginate();
        if (Auth::user()->hasRole('admin')) {
            $assessments = Assessment::with('user')->paginate();
        } else {
            $assessments = Assessment::with('user')->where('user_id', Auth::user()->id)->paginate();
        }

        return view('assessment.index', compact('assessments'))
            ->with('i', ($request->input('page', 1) - 1) * $assessments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View | RedirectResponse
    {
        // is admin
        if (Auth::user()->hasRole('admin')) {
            return Redirect::route('assessments.index')
                ->with('error', 'You are not allowed to create assessment. Only student can create assessment.');
        }

        if (!Auth::user()->isDetailComplete()) {
            return redirect()->route('profile.edit')->with('error', 'Please complete your profile first.');
        }

        $assessment = new Assessment();
        $questions  = \App\Models\Question::with('answers')->get();

        return view('assessment.create', compact('assessment', 'questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssessmentRequest $request): RedirectResponse
    {
        // is admin
        if (Auth::user()->hasRole('admin')) {
            return Redirect::route('assessments.index')
                ->with('error', 'You are not allowed to create assessment. Only student can create assessment.');
        }

        if (!Auth::user()->isDetailComplete()) {
            return redirect()->route('profile.edit')->with('error', 'Please complete your profile first.');
        }

        \Illuminate\Support\Facades\DB::transaction(function () use ($request) {
            $assessment = Assessment::create([
                'user_id' => Auth::user()->id,
            ]);

            // Remove user_id from the request
            $allAnswers = $request->validated();
            unset($allAnswers['user_id']);

            $assessment_answers = [];
            foreach ($allAnswers as $key => $value) {
                [$type, $questionId] = explode('_', $key);

                $assessment_answers[] = [
                    'assessment_id' => $assessment->id,
                    'question_id'   => ($questionId - 8),
                ];

                if (in_array($type, ['choice', 'multiple_choice'])) {
                    $assessment_answers[count($assessment_answers) - 1]['answer_id'] = $value;
                    $assessment_answers[count($assessment_answers) - 1]['answer']    = null;
                } else {
                    $assessment_answers[count($assessment_answers) - 1]['answer_id'] = null;
                    $assessment_answers[count($assessment_answers) - 1]['answer'] = $value;
                }
            }

            \App\Models\AssessmentAnswer::insert($assessment_answers);
        });

        $assessment = Assessment::with(['assessmentAnswers', 'assessmentAnswers.answer.learningStyle'])->where('user_id', auth()->id())->latest()->first();
        if ($assessment) {
            $score = \App\Helpers\ScoreHelper::calculateLearningStyleScore($assessment->assessmentAnswers);

            // Filter answers that have 'answer_id' as null
            $answers = $assessment->assessmentAnswers->where('answer_id', null);

            // Initialize the dataset and average variables
            $datasetOthersData = [
                "mtk" => null,
                "pjok" => null,
            ];

            $average = 0;
            $index = 0;

            // Assign answers to dataset and calculate the average
            foreach ($datasetOthersData as $key => &$value) {
                // Check if answer exists and is numeric
                if (isset($answers[$index]) && is_numeric($answers[$index]->answer)) {
                    $value = (float) $answers[$index]->answer; // Cast to double
                } else {
                    $value = 0; // Set default value if not valid
                }

                $average += $value;
                $index++;
            }

            $weight_mtk = 0.4;
            $weight_pjok = 0.4;
            $weight_learning_style = 0.2; // Jika gaya belajar (visual, auditori, kinestetik) penting

            $total_learning_style = $score['visual'] + $score['auditori'] + $score['kinestetik'];
            $average_learning_style = $total_learning_style / 3; // Menghitung rata-rata dari ketiga jenis gaya belajar

            $skor = ($datasetOthersData['mtk'] * $weight_mtk) + ($datasetOthersData['pjok'] * $weight_pjok) + ($average_learning_style * $weight_learning_style);

            // Calculate the score safely
            $datasetOthersData['skor'] = $skor;

            // prediction
            $prediction = \App\Helpers\KNNHelper::predict(array_merge($score, $datasetOthersData));

            // Merge final data and predict label
            $finalData = array_merge($score, $datasetOthersData);
            $finalData['label'] = $prediction['predicted_label'];

            $inputFinalData = array_merge($finalData, [
                'nama'      => Auth::user()->name,
                'jk'        => Auth::user()->siswaDetail->jk,
                'tgl_lahir' => Auth::user()->siswaDetail->tanggal_lahir,
                'jurusan'   => Auth::user()->siswaDetail->jurusan,
                'kelas'     => CustomNumberHelper::toArabic(Auth::user()->siswaDetail->kelas),
            ]);

            \App\Models\Dataset::create($inputFinalData);
            $lastDataset = \App\Models\Dataset::latest()->first();

            $assessment->update([
                'dataset_id'     => $lastDataset->id,
                'raw_percentage' => collect($prediction['percentage_predictions'])->toJson(),
                'raw_neighbors' => collect($prediction['neighbors'])->toJson(),
            ]);
        } else {
            return redirect()->back()->with('error', 'Terjadi masalah saat menyimpan data. Silahkan coba lagi atau hubungi admin.');
        }

        if (Auth::user()->hasRole('admin')) {
            return Redirect::route('assessments.index')->with('success', 'Assessment created successfully.');
        }

        return Redirect::route('dashboard')->with('success', 'Assessment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $assessment = Assessment::find($id);
        $answers = \App\Models\AssessmentAnswer::with('question.answers')->where('assessment_id', $id)->get();

        $percentage = json_decode($assessment->raw_percentage, true);
        $neighbors = json_decode($assessment->raw_neighbors, true);

        if (!$assessment->ai_recomendation) {
            $age = Auth::user()->siswaDetail->tanggal_lahir;
            $ageString = $age->diffForHumans(null, true);

            $prompt = "Berdasarkan data berikut: Nama: " . Auth::user()->name .
                ", Kelas: " . Auth::user()->siswaDetail->kelas .
                ", Jurusan: " . Auth::user()->siswaDetail->jurusan .
                ", Usia: " . $ageString .
                ", Hasil KNN: " . json_encode($percentage) .
                ", Nilai Matematika: " . ($assessment->dataset->mtk ?? 'Tidak ada terdata') .
                ", Nilai PJOK: " . ($assessment->dataset->pjok ?? 'Tidak ada terdata') .
                ", Rangkum hasil tes, lalu buatkan sebuah pernyataan yang dapat membantu siswa untuk memahami dirinya sendiri. buat dalam bentuk kalimat yang mudah dipahami, jelas, dan tidak membingungkan. jangan tampilkan lagi hasil tes, hanya pernyataan yang membantu siswa memahami dirinya sendiri.";

            $gemini = new \App\Http\Controllers\GeminiApiController();
            $recomendation = $gemini->recomend($prompt);

            $assessment->update([
                'ai_recomendation' => $recomendation,
            ]);
        }

        return view('assessment.show', compact('assessment', 'answers', 'percentage', 'neighbors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $assessment = Assessment::find($id);
        $questions  = \App\Models\Question::with('answers')->get();

        return view('assessment.edit', compact('assessment', 'questions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssessmentRequest $request, Assessment $assessment): RedirectResponse
    {
        $assessment->update($request->validated());

        return Redirect::route('assessments.index')
            ->with('success', 'Assessment updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Assessment::find($id)->delete();

        return Redirect::route('assessments.index')
            ->with('success', 'Assessment deleted successfully');
    }
}
