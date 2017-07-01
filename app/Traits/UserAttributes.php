<?php

namespace App\Traits;

trait UserAttributes
{
    public function getUserNameAttribute()
    {
        return ucfirst($this->user->name);
    }
}

