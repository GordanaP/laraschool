<?php

namespace App\Filters;

use App\Category;
use App\User;

class ThreadFilters extends Filters
{
    /**
     * @var array
     */
    protected $filters = ['author', 'category', 'popular'];

    /**
     * Filter the threads by the given category.
     *
     * @param  string $slug
     */
    protected function category($slug) // filter($value)
    {
        $category = Category::whereSlug($slug)->firstOrFail();

        return $this->builder->where('category_id', $category->id);
    }

    /**
     * Filter the threads by the given author.
     *
     * @param  string $name
     */
    protected function author($name)
    {
        $user = User::whereName($name)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }


    /**
     * Filter the threads by the number of replies.
     *
     */
    protected function popular()
    {
        //clear all orderBy() queries to prevent the overriding of the orderBy('replies_count')
        $this->builder->getQuery()->orders = [];

        return $this->builder->orderBy('replies_count', 'desc');
    }


}