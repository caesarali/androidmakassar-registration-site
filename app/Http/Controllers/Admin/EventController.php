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
}
