<?php

namespace App\Observers;

use App\Reply;

class ReplyObserver
{
    public function deleting(Reply $reply)
    {
        $reply->favorites->each->delete();
    }
}