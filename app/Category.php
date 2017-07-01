<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function path($name)
    {
        return route('categories.'.$name, $this->slug);
    }

/**
     * Get the route key for the model.
     *
     * @return mixed
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
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
