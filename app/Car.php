<?php

namespace App;

use Request;

class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = ['brand', 'model', 'number', 'image_id'];

    public static function getFilteredResults()
    {
        $query = static::ordered();

        if (Request::has('id')) {
            $query = $query->where('id', Request::input('id'));
        }
        if (Request::has('brand')) {
            $query = $query->where('brand', 'like', '%' . Request::input('brand') . '%');
        }
        if (Request::has('model')) {
            $query = $query->where('model', 'like', '%' . Request::input('model') . '%');
        }
        if (Request::has('number')) {
            $query = $query->where('number', 'like', '%' . Request::input('number') . '%');
        }

        return $query->paginate(config('constants.per_page'));
    }
}
