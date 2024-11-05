<?php

namespace App\Listeners;

use App\Mail\AppInstalledMail;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Mail;

class AppInstalledListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(): void
    {
        //
        $email = "admin@example.com"; // Set your recipient email here
        $shop = Auth::user();

        Mail::to($email)->send(new AppInstalledMail($shop));
    }
}
