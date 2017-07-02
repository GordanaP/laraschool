<?php

namespace App\Filters;

abstract class Filters
{
    /**
     *
     * @var mixed;
     */
    protected $builder;

    /**
     *
     * @var array
     */
    protected $filters = []; //['autor', 'category']

    /**
     * Apply to the query builder
     *
     * @param  mixed $builder
     * @return mixed
     */
    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value)  //author=>'name'
        {
            return method_exists($this, $filter) //author(), $name
                ? $this->$filter($value) // ?author($name)
                : $this->builder;  //url without query string
        }
    }

    /**
     * Fetch all filters
     *
     * @return array
     */
    public function getFilters()
    {
        //  retrieve a portion of input data that is actually present on the request
        return request()->intersect($this->filters); //['author', 'category']
    }
}