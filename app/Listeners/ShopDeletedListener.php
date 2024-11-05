<?php

namespace App\Listeners;

use App\Mail\ShopDeletedMail;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Mail;

use Osiset\ShopifyApp\Messaging\Events\ShopDeletedEvent;

class ShopDeletedListener
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
    public function handle(ShopDeletedEvent $event): void
    {
        //
        $email = "admin@example.com"; // Set your recipient email here
        $shop = Auth::user();

        Mail::to($email)->send(new ShopDeletedMail($shop));
    }
}
