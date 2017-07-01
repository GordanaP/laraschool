<?php

namespace App;

use App\Traits\ModelAttributes;
use App\Traits\ThreadReplies;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use ThreadReplies, ModelAttributes;

    protected $fillable = [
        'title', 'body'
    ];

    public function path($name)
    {
        return route('threads.'.$name, $this->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}

