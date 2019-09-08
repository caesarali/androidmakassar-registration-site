<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\City;
use App\Models\Event;
use App\Models\Participant;
use App\Models\Registration;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $cities = City::all();
        $schedules = Schedule::all();
        return view('auth.register', compact('cities', 'schedules'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'city_id' => ['required', 'integer'],
            'event_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:L,P'],
            'birth_date' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string']
        ]);
    }

    protected function create(array $data)
    {
        $data['username'] = explode("@", $data['email'])[0];
        $data['password'] = 'default';
        $checkUsername = DB::table('users')->where('username', $data['username'])->count();
        if ($checkUsername > 0) {
            $data['username'] = $data['username'] . '-' . Str::random(5);
        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
        $user->setRole('member');

        $participant = Participant::create([
            'name' => $user->name,
            'gender' => $data['gender'],
            'birth_date' => $data['birth_date'],
            'email' => $user->email,
            'phone' => $data['phone'],
            'address' => $data['address']
        ]);

        $event = Event::find($data['event_id']);
        Registration::create([
            'event_id' => $event->id,
            'participant_id' => $participant->id,
            'schedule_id' => $data['schedule_id'],
            'paybill' => $event->price
        ]);

        return $user;
    }
}
