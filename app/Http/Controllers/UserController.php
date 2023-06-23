<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::latest()->paginate(5);
        return view('pages.users-management.index', compact('data'));
    }

    public function create()
    {
        return view('pages.users-management.create');
    }

    public function store(Request $request)
    {
        $validatedData = $this->customValidate($request);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['role'] = 2;
        User::create($validatedData);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('pages.users-management.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('pages.users-management.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $this->customValidate($request, $user);

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function customValidate($request, $user = null)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => $user && $user->id ? '' : 'required',
            'email' => $user && $user->id ? '' : 'required|email|unique:users,email,' . $user->id,
            'status' => 'required',
        ], [
            'first_name.required' => 'Name field is required.',
            'last_name.required' => 'Name field is required.',
            'password.required' => 'Password field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be email address.',
            'status.required' => 'Status field is required.',
        ]);

        return $validatedData;
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
