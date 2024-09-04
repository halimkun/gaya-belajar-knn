<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AnswerRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $answers = Answer::paginate();

        return view('answer.index', compact('answers'))
            ->with('i', ($request->input('page', 1) - 1) * $answers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $answer = new Answer();

        return view('answer.create', compact('answer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnswerRequest $request): RedirectResponse
    {
        Answer::create($request->validated());

        return Redirect::route('answers.index')
            ->with('success', 'Answer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $answer = Answer::find($id);

        return view('answer.show', compact('answer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $answer = Answer::find($id);

        return view('answer.edit', compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnswerRequest $request, Answer $answer): RedirectResponse
    {
        $answer->update($request->validated());

        return Redirect::route('answers.index')
            ->with('success', 'Answer updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Answer::find($id)->delete();

        return Redirect::route('answers.index')
            ->with('success', 'Answer deleted successfully');
    }
}
