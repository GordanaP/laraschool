<?php

namespace App\Observers;

use App\Activity;
use App\Thread;

class ThreadObserver
{
    public function creating(Thread $thread)
    {
        $thread->slug = str_slug($thread->title);
    }

    public function deleting(Thread $thread)
    {
        $thread->replies->each->delete();
    }
}