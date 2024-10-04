<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DatasetRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DatasetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $datasets = Dataset::orderBy('created_at', 'desc')->paginate();

        return view('dataset.index', compact('datasets'))
            ->with('i', ($request->input('page', 1) - 1) * $datasets->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $dataset = new Dataset();

        return view('dataset.create', compact('dataset'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DatasetRequest $request): RedirectResponse
    {
        Dataset::create($request->validated());

        return Redirect::route('datasets.index')
            ->with('success', 'Dataset created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $dataset = Dataset::find($id);

        return view('dataset.show', compact('dataset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $dataset = Dataset::find($id);

        return view('dataset.edit', compact('dataset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DatasetRequest $request, Dataset $dataset): RedirectResponse
    {
        $dataset->update($request->validated());

        return Redirect::route('datasets.index')
            ->with('success', 'Dataset updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Dataset::find($id)->delete();

        return Redirect::route('datasets.index')
            ->with('success', 'Dataset deleted successfully');
    }
}
