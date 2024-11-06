<?php

namespace App\Http\Controllers;

use App\Helpers\CustomNumberHelper;
use App\Models\Assessment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AssessmentRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // $assessments = Assessment::paginate();
        $assessments = Assessment::with('user')->paginate();

        return view('assessment.index', compact('assessments'))
            ->with('i', ($request->input('page', 1) - 1) * $assessments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View | RedirectResponse
    {
        // is admin
        if (auth()->user()->hasRole('admin')) {
            return Redirect::route('assessments.index')
                ->with('error', 'You are not allowed to create assessment. Only student can create assessment.');
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
        \Illuminate\Support\Facades\DB::transaction(function () use ($request) {
            $assessment = Assessment::create([
                'user_id' => auth()->id(),
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

        $assessment = Assessment::with('assessmentAnswers.answer.learningStyle')->where('user_id', auth()->id())->latest()->first();
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

            // Calculate the score safely
            $datasetOthersData['skor'] = count($datasetOthersData) > 0 ? $average / count($datasetOthersData) : 0;

            // Merge final data and predict label
            $finalData = array_merge($score, $datasetOthersData);
            $finalData['label'] = \App\Helpers\KNNHelper::predict($finalData);

            $inputFinalData = array_merge($finalData, [
                'nama'      => auth()->user()->name,
                'jk'        => auth()->user()->siswaDetail->jk,
                'tgl_lahir' => auth()->user()->siswaDetail->tanggal_lahir,
                'jurusan'   => auth()->user()->siswaDetail->jurusan,
                'kelas'     => CustomNumberHelper::toArabic(auth()->user()->siswaDetail->kelas),
            ]);

            \App\Models\Dataset::create($inputFinalData);
            $lastDataset = \App\Models\Dataset::latest()->first();

            $assessment->update([
                'dataset_id' => $lastDataset->id,
            ]);
        } else {
            return redirect()->back()->with('error', 'Terjadi masalah saat menyimpan data. Silahkan coba lagi atau hubungi admin.');
        }

        if (auth()->user()->hasRole('admin')) {
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

        return view('assessment.show', compact('assessment', 'answers'));
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
