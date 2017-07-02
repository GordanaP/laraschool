<?php

namespace App\Traits;

use App\Favorite;
use Auth;

trait Favorited
{
    public function isFavoritedBy($user)
    {
        return $this->favorites()->where('user_id', $user->id)->exists();
    }

    public function favoriteBy($user)
    {
        $favorite = new Favorite;
        $favorite->user_id = $user->id;

        $this->favorites()->save($favorite);
    }
}