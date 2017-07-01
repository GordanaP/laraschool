<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    protected static function boot()
    {
        parent::boot();

        static::observe(\App\Observers\CategoryObserver::class);
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
