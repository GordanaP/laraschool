<?php

namespace App;

use App\Traits\Favorited;
use App\Traits\TimeAttributes;
use App\Traits\UserAttributes;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use TimeAttributes, UserAttributes, Favorited;

    protected $fillable = [
        'body', 'user_id'
    ];

    protected $with = ['favorites'];

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
}
