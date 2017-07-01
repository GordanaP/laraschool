<?php

namespace App\Traits;

trait ThreadAttributes
{
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getBodyAttribute($value)
    {
        return ucfirst($value);
    }
}