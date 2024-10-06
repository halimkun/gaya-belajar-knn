<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LearningMaterials extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // only user with role siswa
        $user = auth()->user();

        if (!$user->hasRole('siswa')) {
            return redirect()->route('dashboard');
        }

        $assessment = $user->assessments()->orderBy('created_at', 'desc')->first();
        $learningStyles = \Illuminate\Support\Str::lower(trim($assessment->dataset->label));
        $expLearningStyles = explode('-', $learningStyles);

        // get id of learning styles
        $learningStylesId = [];
        foreach ($expLearningStyles as $expLearningStyle) {
            $learningStyle = \App\Models\LearningStyle::where('type', 'like', "%$expLearningStyle%")->first();

            if ($learningStyle) {
                $learningStylesId[] = $learningStyle->id;
            }
        }

        // if empty learning style id show all educational contents
        if (empty($learningStylesId)) {
            $educationalContents = \App\Models\EducationalContent::all();
        }

        $educationalContents = \App\Models\EducationalContent::whereIn('learning_style_id', $learningStylesId)->get();

        // TODO : show educational contents based on learning styles
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
