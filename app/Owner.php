<?php

namespace App;

use Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class Owner extends Model
{
    use SoftDeletes;

    protected $table = 'owners';

    protected $dates = ['deleted_at'];

    protected $fillable = ['firstname', 'lastname', 'email', 'image_id'];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'owner_car');
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
