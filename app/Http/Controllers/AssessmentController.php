<?php

namespace App\Http\Controllers;

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
        $assessments = Assessment::paginate();

        return view('assessment.index', compact('assessments'))
            ->with('i', ($request->input('page', 1) - 1) * $assessments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $assessment = new Assessment();

        return view('assessment.create', compact('assessment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssessmentRequest $request): RedirectResponse
    {
        Assessment::create($request->validated());

        return Redirect::route('assessments.index')
            ->with('success', 'Assessment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $assessment = Assessment::find($id);

        return view('assessment.show', compact('assessment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $assessment = Assessment::find($id);

        return view('assessment.edit', compact('assessment'));
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
