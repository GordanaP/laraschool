<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
        'title', 'body'
    ];

    public function path($name)
    {
        return route('threads.'.$name, $this->id);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

