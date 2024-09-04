<?php

namespace App\Http\Controllers;

use App\Models\UserLearningStyle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UserLearningStyleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserLearningStyleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $userLearningStyles = UserLearningStyle::paginate();

        return view('user-learning-style.index', compact('userLearningStyles'))
            ->with('i', ($request->input('page', 1) - 1) * $userLearningStyles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $userLearningStyle = new UserLearningStyle();

        return view('user-learning-style.create', compact('userLearningStyle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserLearningStyleRequest $request): RedirectResponse
    {
        UserLearningStyle::create($request->validated());

        return Redirect::route('user-learning-styles.index')
            ->with('success', 'UserLearningStyle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $userLearningStyle = UserLearningStyle::find($id);

        return view('user-learning-style.show', compact('userLearningStyle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $userLearningStyle = UserLearningStyle::find($id);

        return view('user-learning-style.edit', compact('userLearningStyle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserLearningStyleRequest $request, UserLearningStyle $userLearningStyle): RedirectResponse
    {
        $userLearningStyle->update($request->validated());

        return Redirect::route('user-learning-styles.index')
            ->with('success', 'UserLearningStyle updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        UserLearningStyle::find($id)->delete();

        return Redirect::route('user-learning-styles.index')
            ->with('success', 'UserLearningStyle deleted successfully');
    }
}
