<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'user_ids' => 'required|array'
        ], [
            'user_ids.required' => 'Please select at least one user at delete...'
        ]);

        User::whereIn('id', $request->user_ids)->delete();

        return back();
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'alpha_num',
                'unique:users,username'
            ],
            'user_title' => ['required'],
            'password' => ['required', 'min:6'],
        ], [
            'username.required' => 'Username field is required',
            'username.alpha_num' => 'Username filed may only contain letters and numbers, and cannot contain spaces',
            'user_title.required' => 'Password filed is required',
            'password.min' => 'Password must be at least 6 characters',
        ]);

        User::create([
            'username' => $request->username,
            'user_title' => $request->user_title,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index');
    }
}
