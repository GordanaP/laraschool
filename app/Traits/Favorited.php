<?php

namespace App\Traits;

use App\Favorite;
use Auth;

trait Favorited
{
    protected static function bootFavorited()
    {
        static::deleting(function ($model) {
            $model->favorites->each->delete();
        });
    }

    /**
     * Deteremine if the current reply has been favorited
     *
     * @return boolean
     */
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
        // pick all the collections and filter through each of them to delete the model ($favorite) which allows the model in RecordsActivity to fire the event delete() activity
        $this->favorites->where('user_id', Auth::id())->each->delete();
    }

    /**
     * Get the number of favorites for the reply.
     *
     * @return integer
     */
    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }

    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }

}