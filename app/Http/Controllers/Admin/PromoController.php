<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Promo;

class PromoController extends Controller
{
    public function index(Request $request)
    {
        $promo = Promo::all();
        return view('pages.admin.promo.index', compact('request', 'promo'));
    }

    public function create()
    {
        $events = Event::all();
        return view('pages.admin.promo.create', compact('events'));
    }

    public function store(Request $request)
    {

    }

    public function edit(Promo $promo)
    {
        $events = Event::all();
        return view('pages.admin.promo.edit', compact('promo', 'events'));
    }
}
