<?php

namespace App\Traits;

trait ThreadReplies
{
    public function path_to_reply($name)
    {
        return route('replies.'.$name, $this->id);
    }

    public function addReply($reply)
    {
        return $this->replies()->create($reply);
    }

}

