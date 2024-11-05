<?php

namespace App\Listeners;

use App\Mail\ShopAuthenticatedMail;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Mail;

use Osiset\ShopifyApp\Messaging\Events\ShopAuthenticatedEvent;

class ShopAuthenticatedListener
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
    public function handle(ShopAuthenticatedEvent $event): void
    {
        //
        $email = "admin@example.com"; // Set your recipient email here
        $shop = Auth::user();

        Mail::to($email)->send(new ShopAuthenticatedMail($shop));
    }
}
