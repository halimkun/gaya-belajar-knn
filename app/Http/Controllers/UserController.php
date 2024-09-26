<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $role = $request->input('role');

        if ($role) {
            $users = User::whereHas('roles', function ($query) use ($role) {
                $query->where('name', $role);
            })->paginate();
        } else {
            $users = User::paginate();
        }

        // $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $user = new User();
        $roles = Role::all();

        return view('user.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $request->validate([
            'password' => \Illuminate\Validation\Rules\Password::min(8)->numbers(),
        ]);

        // hash password
        $request->merge([
            'password' => bcrypt($request->password),
        ]);

        // create user
        $user = User::create($request->only('name', 'email', 'password'));

        // assign role
        $user->assignRole($request->role);

        return Redirect::route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        if ($request->input('password')) {
            $request->validate([
                'password' => \Illuminate\Validation\Rules\Password::min(8)->numbers(),
            ]);

            $user->update([
                'password' => bcrypt($request->password),
            ]);
        }

        // remove all role
        $user->roles()->detach();

        // update user
        $user->update($request->validated());

        // assign role
        $user->assignRole($request->role);

        return Redirect::route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();

        return Redirect::route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
