<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 🧾 List all users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // ✏️ Show edit form
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // 💾 Save changes
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $user->update($request->only(['name', 'email']));

        return redirect()->route('users.index')->with('success', 'User updated.');
    }

    // ❌ Delete user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted.');
    }
}
