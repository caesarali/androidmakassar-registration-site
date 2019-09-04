<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = auth()->user()->participant;
        return view('pages.member.profile', compact('profile'));
    }

    public function update(Request $request)
    {
        dd($request->all());
    }
}
