<?php

namespace App\Traits;

use App\Favorite;
use Auth;

trait Favorited
{
    public function isFavorited()
    {
        return (bool) $this->favorites->where('user_id', Auth::id())->count();
    }

    public function favorite()
    {
        $favorite = new Favorite;
        $favorite->user_id = Auth::id();

        $this->favorites()->save($favorite);
    }

    public function unfavorite()
    {
        $this->favorites()->where('user_id', Auth::id())->delete();
    }


    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }

    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }

}