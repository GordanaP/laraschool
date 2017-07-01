<?php

namespace App;

use App\Traits\TimeAttributes;
use App\Traits\UserAttributes;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use TimeAttributes, UserAttributes;

    protected $fillable = [
        'body', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
