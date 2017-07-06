<?php

namespace App;

use App\Traits\Favorited;
use App\Traits\RecordsActivity;
use App\Traits\TimeAttributes;
use App\Traits\UserAttributes;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use TimeAttributes, UserAttributes, Favorited, RecordsActivity;

    protected $fillable = [
        'body', 'user_id'
    ];

    protected $with = ['favorites'];

    protected static function boot()
    {
        parent::boot();

        static::observe(\App\Observers\ReplyObserver::class);
    }

    public function path($name)
    {
        return route('replies.'.$name, $this->id);
    }

    public function path_to_thread()
    {
        return route('threads.index') .'#reply-'.$this->id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class)->with('user');
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favorited'); //prefix
    }

    /**
     * A thread has many activity
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activities()
    {
        return $this->morphMany(Activity::class, 'subject');
    }

}
