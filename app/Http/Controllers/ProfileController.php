<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ProfileDetailUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'detail' => $request->user()->siswaDetail,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated')->with('success', 'Profile updated successfully.');
    }

    /**
     * Update the user's profile detail information.
     */
    public function updateDetail(ProfileDetailUpdateRequest $request): RedirectResponse
    {
        if ($request->user()->siswaDetail) {
            $request->user()->siswaDetail->fill($request->validated());
            $request->user()->siswaDetail->save();
        } else {
            $data = $request->validated();
            $data['user_id'] = $request->user()->id;

            $request->user()->siswaDetail()->create($data);
        }

        return Redirect::route('profile.edit')->with('status', 'profile-detail-updated')->with('success', 'Profile detail updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
