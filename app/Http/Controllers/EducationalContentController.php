<?php

namespace App\Http\Controllers;

use App\Models\EducationalContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EducationalContentRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EducationalContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $educationalContents = EducationalContent::paginate();

        return view('educational-content.index', compact('educationalContents'))
            ->with('i', ($request->input('page', 1) - 1) * $educationalContents->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $educationalContent = new EducationalContent();

        return view('educational-content.create', compact('educationalContent'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EducationalContentRequest $request): RedirectResponse
    {
        EducationalContent::create($request->validated());

        return Redirect::route('educational-contents.index')
            ->with('success', 'EducationalContent created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $educationalContent = EducationalContent::find($id);

        return view('educational-content.show', compact('educationalContent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $educationalContent = EducationalContent::find($id);

        return view('educational-content.edit', compact('educationalContent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EducationalContentRequest $request, EducationalContent $educationalContent): RedirectResponse
    {
        $educationalContent->update($request->validated());

        return Redirect::route('educational-contents.index')
            ->with('success', 'EducationalContent updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        EducationalContent::find($id)->delete();

        return Redirect::route('educational-contents.index')
            ->with('success', 'EducationalContent deleted successfully');
    }
}
