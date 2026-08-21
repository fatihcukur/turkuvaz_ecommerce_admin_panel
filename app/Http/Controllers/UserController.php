<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


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
}
