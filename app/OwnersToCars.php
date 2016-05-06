<?php

namespace App;

namespace App;

use Request;

class OwnersToCars extends Model
{
    protected $table = 'ownerstocarsview';

    public static function getFilteredResults()
    {
        $query = static::orderBy('firstname', 'ASC')->orderBy('lastname', 'ASC');

        if (Request::has('firstname')) {
            $query = $query->where('firstname', 'like', '%' . Request::input('firstname') . '%');
        }
        if (Request::has('lastname')) {
            $query = $query->where('lastname', 'like', '%' . Request::input('lastname') . '%');
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
