<?php

namespace App\Providers;

use App\Mail\EmailVerification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        VerifyEmail::toMailUsing(function ($notifiable) {
            $verificationUrl = URL::temporarySignedRoute(
                'verification.verify', now()->addMinutes(60), ['id' => $notifiable->getKey()]
            );

            $password = Str::random(10);
            $notifiable->update(['password' => bcrypt($password)]);
            $notifiable->load('participant');

            // Mail::to($notifiable)->queue(new EmailVerification($verificationUrl, $notifiable, $password));
            // return new EmailVerification($verificationUrl, $notifiable, $password);
            return (new MailMessage)
                ->subject('Welcome to Android Makassar!')
                ->markdown('emails.verify', [
                    'url' => $verificationUrl,
                    'user' => $notifiable,
                    'password' => $password,
                ]);
        });
    }
}
