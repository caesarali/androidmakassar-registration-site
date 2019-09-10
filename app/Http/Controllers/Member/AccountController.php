<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        return view('pages.member.setting', compact('user'));
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'username' => 'required|string|unique:users,username,' . $user->id,
            'password' => 'nullable|string|confirmed'
        ]);

        $user->update([
            'username' => $request->username ?? $user->username,
            'password' => bcrypt($request->password ?? $user->password),
        ]);

        return redirect()->back()->withSuccess('Perubahan disimpan!');
    }
}
