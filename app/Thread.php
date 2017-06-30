<?php

namespace App;

use App\Traits\TimeAttributes;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use TimeAttributes;

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

