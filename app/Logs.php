<?php

namespace App;

class Logs extends Model
{
    protected $table = 'logs';

    public static function getFilteredResults()
    {
        $query = static::orderBy('id', 'DESC');

        return $query->paginate(config('constants.per_page'));
    }
}
