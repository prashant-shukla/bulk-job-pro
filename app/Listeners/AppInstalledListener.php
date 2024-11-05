<?php

namespace App\Listeners;

use App\Mail\AppInstalledMail;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Mail;

use Osiset\ShopifyApp\Messaging\Events\AppInstalledEvent;

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
    public function handle(AppInstalledEvent $event): void
    {
        //
        $email = "admin@example.com"; // Set your recipient email here
        $shop = Auth::user();

        Mail::to($email)->send(new AppInstalledMail($shop));
    }
}
