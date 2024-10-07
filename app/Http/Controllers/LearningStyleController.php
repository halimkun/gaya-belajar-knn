<?php

namespace App\Http\Controllers;

use App\Models\LearningStyle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LearningStyleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LearningStyleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $learningStyles = LearningStyle::paginate();

        return view('learning-style.index', compact('learningStyles'))
            ->with('i', ($request->input('page', 1) - 1) * $learningStyles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $learningStyle = new LearningStyle();

        return view('learning-style.create', compact('learningStyle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LearningStyleRequest $request): RedirectResponse
    {
        LearningStyle::create($request->validated());

        return Redirect::route('learning-styles.index')
            ->with('success', 'LearningStyle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $learningStyle = LearningStyle::find($id);

        return view('learning-style.show', compact('learningStyle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $learningStyle = LearningStyle::find($id);

        if (in_array(\Str::lower($learningStyle->type), ['visual', 'auditory', 'kinesthetic'])) {
            return Redirect::back()->with('error', 'You cannot edit default learning styles');
        }

        return view('learning-style.edit', compact('learningStyle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LearningStyleRequest $request, LearningStyle $learningStyle): RedirectResponse
    {
        if (in_array(\Str::lower($learningStyle->type), ['visual', 'auditory', 'kinesthetic'])) {
            return Redirect::back()->with('error', 'You cannot edit default learning styles');
        }

        $learningStyle->update($request->validated());

        return Redirect::route('learning-styles.index')
            ->with('success', 'LearningStyle updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $learningStyle = LearningStyle::find($id);

        if (in_array(\Str::lower($learningStyle->type), ['visual', 'auditory', 'kinesthetic'])) {
            return Redirect::back()->with('error', 'You cannot delete default learning styles');
        }

        $learningStyle->delete();

        return Redirect::route('learning-styles.index')
            ->with('success', 'LearningStyle deleted successfully');
    }
}
