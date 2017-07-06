<?php

namespace App;

use App\Traits\TimeAttributes;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use TimeAttributes;

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
        return static::where('user_id', $user->id)
            ->latest()
            ->take($take)
            ->get();
    }

}