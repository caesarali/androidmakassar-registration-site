<?php

namespace App\Http\Controllers;

use App\Models\Event as Courses;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->hasRole('member')) {
            $user = auth()->user();
            $registrations = $user->participant->registrations;
            return view('pages.member.home', compact('registrations'));
        }

        return view('pages.admin.dashboard');
    }
}
