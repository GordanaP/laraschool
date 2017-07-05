<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->morphTo();
    }

    public static function feed($user, $take=50)
    {
        //return $user->activities()->latest()->take(50)->with('subject')->get();
        return static::where('user_id', $user->id)
            ->latest()
                ->with('subject')
                ->take($take)
                ->get();
    }
}
