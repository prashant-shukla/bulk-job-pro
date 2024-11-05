<?php

namespace App\Listeners;

use Illuminate\Bus\Queueable;
use App\Mail\PlanActivatedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Osiset\ShopifyApp\Messaging\Events\PlanActivatedEvent;

class SendPlanActivatedEmailListener implements ShouldQueue
{
    use Queueable;
    /**
     * Create the event listener.
     *
     * @return void
     */
    protected Shop $shop;

    public function __construct()
    {
        $this->onQueue('default');
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PlanActivatedEvent $event)
    {
        Mail::to($event->shop->email)
            ->send(new PlanActivatedMail($event->plan, $event->chargeId));
    }
}