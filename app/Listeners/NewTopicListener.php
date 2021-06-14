<?php

namespace App\Listeners;

use App\Events\NewTopicEvent;
use App\Models\Topic;
use Illuminate\Support\Str;

class NewTopicListener
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
     * @param  NewTopicEvent  $event
     * @return void
     */
    public function handle(NewTopicEvent $event)
    {
        $topic = new Topic();

        $topic->user_id = auth()->user()->id;
        $topic->forum_id = $event->request->forum_id;
        $topic->title = $event->request->title;
        $topic->slug = Str::slug($event->request->title.'-'.random_int(100000, 999999));
        $topic->description = $event->request->description;
        $topic->save();

    }
}
