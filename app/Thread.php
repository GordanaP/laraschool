<?php

namespace App;

use App\Traits\ModelAttributes;
use App\Traits\ThreadReplies;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use ThreadReplies, ModelAttributes;

    protected $fillable = [
        'title', 'body', 'category_id'
    ];

    protected $with = ['user', 'category'];

    protected static function boot()
    {
        parent::boot();

        static::observe(\App\Observers\ThreadObserver::class);

        static::addGlobalScope('replyCount', function($query){
           $query->withCount('replies');
        });
    }

    public function path($name)
    {
        return route('threads.'.$name, [$this->category->slug, $this->slug]);
    }

    public function path_to_reply($name)
    {
        return route('replies.'.$name, [$this->category->slug, $this->slug]);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, $filters)
    {
        $filters->apply($query);
    }
}

