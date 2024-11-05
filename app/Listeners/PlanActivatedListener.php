<?php

namespace App\Listeners;

use App\Mail\PlanActivatedMail;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Mail;

class PlanActivatedListener
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

        Mail::to($email)->send(new PlanActivatedMail($shop));
    }
}
