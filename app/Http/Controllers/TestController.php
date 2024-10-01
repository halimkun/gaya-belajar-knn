<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all data from database
        $dataset = \App\Models\Dataset::get();

        // map datasets labels
        $label = $dataset->map(function ($item) {
            return $item->label;
        });

        // map datasets samples
        $sampel = $dataset->map(function ($item) {
            return [
                "jk"         => \Str::lower($item->jk),
                "tgl_lahir"  => $item->tgl_lahir->age,
                "jurusan"    => \Str::upper($item->jurusan),
                "kelas"      => $item->kelas,
                "mtk"        => $item->mtk,
                "pjok"       => $item->pjok,
                "visual"     => $item->visual,
                "auditori"   => $item->auditori,
                "kinestetik" => $item->kinestetik,
                "skor"       => $item->skor,
            ];
        });

        $estimator = new \Rubix\ML\Classifiers\KNearestNeighbors(3);
        $dataset = new \Rubix\ML\Datasets\Labeled($sampel->toArray(), $label->toArray());

        // split
        // [$training, $testing] = $dataset->randomize()->stratifiedSplit(0.6);

        // ===== Train
        // preprocessing data
        $dataset->apply(new \App\RubixCustom\Transformer\CustomLabelTransformer())
            ->apply(new \Rubix\ML\Transformers\ZScaleStandardizer());

        // train the model
        $estimator->train($dataset);

        // Validate
        $validator = new \Rubix\ML\CrossValidation\HoldOut(0.2);
        $score = $validator->test($estimator, $dataset, new \Rubix\ML\CrossValidation\Metrics\Accuracy());

        // // ===== Predict
        // // preprocessing data
        // $testing->apply(new \App\RubixCustom\Transformer\CustomLabelTransformer())
        //     ->apply(new \Rubix\ML\Transformers\ZScaleStandardizer());

        // // predict the data
        // $prediction = $estimator->predict($testing);

        // // ===== Evaluate
        // $metric = new \Rubix\ML\CrossValidation\Metrics\Accuracy();

        // $score = $metric->score($prediction, $testing->labels());

        $userInput = [
            ["jk" => "laki-laki", "tgl_lahir" => 18, "jurusan" => "TKJ", "kelas" => 10, "mtk" => 75, "pjok" => 80, "visual" => 8, "auditori" => 4, "kinestetik" => 4, "skor" => 77.5],
            // ["jk" => "perempuan", "tgl_lahir" => 23, "jurusan" => "ANIMASI", "kelas" => 11, "mtk" => 78, "pjok" => 84, "visual" => 9, "auditori" => 6, "kinestetik" => 1, "skor" => 81],
            // ["jk" => "laki-laki", "tgl_lahir" => 24, "jurusan" => "PPLG", "kelas" => 11, "mtk" => 80, "pjok" => 89, "visual" => 5, "auditori" => 4, "kinestetik" => 7, "skor" => 84.5],
            // ["jk" => "perempuan", "tgl_lahir" => 21, "jurusan" => "ANIMASI", "kelas" => 12, "mtk" => 77, "pjok" => 90, "visual" => 7, "auditori" => 7, "kinestetik" => 2, "skor" => 83.5],
        ];

        // preprocessing data
        $userInput = new \Rubix\ML\Datasets\Unlabeled($userInput);

        $userInput->apply(new \App\RubixCustom\Transformer\CustomLabelTransformer())
            ->apply(new \Rubix\ML\Transformers\ZScaleStandardizer());

        // predict the data
        $prediction = $estimator->predict($userInput);

        return response()->json([
            'score' => $score,
            'prediction' => $prediction,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
