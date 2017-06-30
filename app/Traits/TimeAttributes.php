<?php

namespace App\Traits;

trait TimeAttributes
{
    public function getCreatedAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getCreatedFormatAttribute()
    {
        return $this->created_at->format('d M Y');
    }
}

