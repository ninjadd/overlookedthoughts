<?php

namespace App\Listeners;

use App\Events\NewForumEvent;
use App\Models\Forum;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

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
        $forum = new Forum();

        $forum->user_id = auth()->user()->id;
        $forum->title = $event->request->title;
        $forum->slug = Str::slug($event->request->title.'-'.random_int(100000, 999999));
        $forum->description = $event->request->description;
        $forum->save();
        
    }
}
