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
        $request->validate([
            'code' => 'required|string|unique:promo',
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'event_id' => 'required|integer',
            'discount' => 'required|integer',
            'from_date' => 'required|date',
            'to_date' => 'required|date'
        ]);

        $promo = Promo::create($request->all());

        return redirect()->back()->withSuccess('Promo has been created.');
    }

    public function edit(Promo $promo)
    {
        $events = Event::all();
        return view('pages.admin.promo.edit', compact('promo', 'events'));
    }

    public function update(Request $request, Promo $promo)
    {
        $request->validate([
            'code' => 'required|string|unique:promo,code,' . $promo->id,
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'event_id' => 'required|integer',
            'discount' => 'required|integer',
            'from_date' => 'required|date',
            'to_date' => 'required|date'
        ]);

        $promo->update($request->all());

        return redirect()->back()->withSuccess('Saved.');
    }
}
