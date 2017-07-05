<?php

namespace App\Traits;

use App\Reply;

trait ThreadReplies
{
    public function path_to_reply($name)
    {
        return route('replies.'.$name, $this->id);
    }

    public function addReply($user)
    {
        $reply = new Reply;

        $reply->body = request()->body;
        $reply->user()->associate($user);

        return $this->replies()->save($reply);
    }

}

