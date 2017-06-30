<?php

namespace App;

use App\Traits\TimeAttributes;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use TimeAttributes;

    protected $fillable = [
        'body'
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
