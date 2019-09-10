<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Gravatar;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = auth()->user()->participant;
        $gravatar = Gravatar::src($profile->email);
        // $size = 200;
        // $gravatar = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($profile->email))) . "&s=" . $size;
        return view('pages.member.profile', compact('profile', 'gravatar'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'gender' => 'required|in:L,P',
            'birth_date' => 'required|date',
            'email' => 'required|string|unique:users,email,' . $request->user()->id,
            'phone' => 'required|string|max:12',
            'address' => 'required|string'
        ]);

        $user = $request->user();
        $profile = $user->participant;
        $profile->update($request->all());
        if ($user->name != $request->name) {
            $user->update(['name' => $request->name]);
        }
        if ($user->email != $request->email) {
            $user->update(['email' => $request->email]);
        }

        return redirect()->back()->withSuccess('Perubahan disimpan!');
    }
}
