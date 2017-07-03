<?php

namespace App\Traits;

use App\Favorite;
use Auth;

trait Favorited
{
    public function isFavoritedBy($user)
    {
        return (bool) $this->favorites->where('user_id', $user->id)->count();
    }

    public function favoriteBy($user)
    {
        $favorite = new Favorite;
        $favorite->user_id = $user->id;

        $this->favorites()->save($favorite);
    }
}