<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('mailable', function () {
    $this->info('Sending mail..');
    $notifiable = App\Models\User::where('email', 'cesartkj@gmail.com')->first();
    $notifiable->load('participant');

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify', now()->addMinutes(60), ['id' => $notifiable->getKey()]
    );

    $password = Str::random(10);

    // return new App\Mail\EmailVerification($verificationUrl, $notifiable, $password);
    Mail::to($notifiable)->queue(new App\Mail\EmailVerification($verificationUrl, $notifiable, $password));
});
