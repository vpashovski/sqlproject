<?php

namespace App;

use Request;

class Owner extends Model
{
    protected $table = 'owners';

    protected $fillable = ['firstname', 'lastname', 'email', 'image_id'];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public static function getFilteredResults()
    {
        $query = static::ordered();

        if (Request::has('id')) {
            $query = $query->where('id', Request::input('id'));
        }
        if (Request::has('firstname')) {
            $query = $query->where('firstname', 'like', '%' . Request::input('firstname') . '%');
        }
        if (Request::has('lastname')) {
            $query = $query->where('lastname', 'like', '%' . Request::input('lastname') . '%');
        }
        if (Request::has('email')) {
            $query = $query->where('email', 'like', '%' . Request::input('email') . '%');
        }

        return $query->paginate(config('constants.per_page'));
    }
}
