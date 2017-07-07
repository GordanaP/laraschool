<?php

namespace App\Traits;

use App\Activity;
use Auth;

trait RecordsActivity
{
    protected static function bootRecordsActivity()
    {
        if (Auth::guest()) return; //Ignore the test when no Auth::user()

        foreach (static::getActivities() as $activity)
        {
            static::$activity(function($model) use ($activity)
            {
                $model->recordsActivity($activity);
            });
        }

        // delete model activities
        // delete model-relationship activities in ModelObserver
        static::deleting(function ($model) {

            //event fires on the model
            $model->activities()->delete();
        });
    }

    protected static function getActivities()
    {
        return ['created'];
    }

    protected function recordsActivity($type)
    {
        $activity = new Activity;

        $activity->type = $this->getActivity($type);
        $activity->user()->associate(Auth::user());

        $this->activities()->save($activity);
    }

    protected function getActivity($type) //created
    {
        $model = strtolower((new \ReflectionClass($this))->getShortName()); //thread

        return "{$type}_{$model}"; // created_thread
    }
}