<?php

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/events/{city}', function ($city) {
    $events = Event::where('city_id', $city)->get();
    return response()->json($events);
});

Route::get('/registrations/{code}', function ($code) {
    $registration = Registration::where('code', $code)->firstOrFail();
    $registration->load(['receipt', 'participant', 'event']);
    return response()->json($registration);
});
