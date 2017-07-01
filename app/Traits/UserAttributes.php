<?php

namespace App\Traits;

trait UserAttributes
{
    public function getUserNameAttribute()
    {
        return '@'.$this->user->name;
    }
}

