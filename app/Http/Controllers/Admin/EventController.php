<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Event as Courses;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $courses = Courses::paginate();
        return view('pages.admin.courses.index', compact('request', 'courses'));
    }

    public function create()
    {
        $cities = City::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('pages.admin.courses.create', compact('cities', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:events',
            'description' => 'required|string',
            'price' => 'required|integer',
            'category_id' => 'required|integer',
            'city_id' => 'required|integer'
        ]);

        $courses = Courses::create($request->all());

        return redirect()->route('courses.index')->withSuccess('Kursus baru ditambahkan.');
    }

    public function show($id)
    {
        $courses = Courses::where('code', $id)->firstOrFail();
        $registrations = $courses->registrations->load('participant');
        return view('pages.admin.courses.show', compact('courses', 'registrations'));
    }

    public function edit($id)
    {
        $courses = Courses::where('code', $id)->firstOrFail();
        $cities = City::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('pages.admin.courses.edit', compact('courses', 'cities', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $courses = Courses::findOrFail($id);
        $request->validate([
            'name' => 'required|string|unique:events,name,' . $courses->id,
            'description' => 'required|string',
            'price' => 'required|integer',
            'category_id' => 'required|integer',
            'city_id' => 'required|integer'
        ]);

        $courses->update($request->all());

        return redirect()->back()->withSuccess('Perubahan disimpan.');
    }
}
