<?php

namespace App\Listeners;

use App\Events\NewForumEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewForumListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewForumEvent  $event
     * @return void
     */
    public function handle(NewForumEvent $event)
    {
        dd($event);
    }
}
