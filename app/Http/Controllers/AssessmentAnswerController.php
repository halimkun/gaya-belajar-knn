<?php

namespace App\Http\Controllers;

use App\Models\AssessmentAnswer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AssessmentAnswerRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AssessmentAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $assessmentAnswers = AssessmentAnswer::paginate();

        return view('assessment-answer.index', compact('assessmentAnswers'))
            ->with('i', ($request->input('page', 1) - 1) * $assessmentAnswers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $assessmentAnswer = new AssessmentAnswer();

        return view('assessment-answer.create', compact('assessmentAnswer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssessmentAnswerRequest $request): RedirectResponse
    {
        AssessmentAnswer::create($request->validated());

        return Redirect::route('assessment-answers.index')
            ->with('success', 'AssessmentAnswer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $assessmentAnswer = AssessmentAnswer::find($id);

        return view('assessment-answer.show', compact('assessmentAnswer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $assessmentAnswer = AssessmentAnswer::find($id);

        return view('assessment-answer.edit', compact('assessmentAnswer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssessmentAnswerRequest $request, AssessmentAnswer $assessmentAnswer): RedirectResponse
    {
        $assessmentAnswer->update($request->validated());

        return Redirect::route('assessment-answers.index')
            ->with('success', 'AssessmentAnswer updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        AssessmentAnswer::find($id)->delete();

        return Redirect::route('assessment-answers.index')
            ->with('success', 'AssessmentAnswer deleted successfully');
    }
}
