<?php

namespace App;

use App\Helpers\UploadImage;
use Request;

class Image extends Model
{
    use UploadImage;

    protected $table = 'images';

    protected $fillable = ['title', 'ext'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function owners()
    {
        return $this->hasMany(Owner::class);
    }

    public static function getFilteredResults()
    {
        $query = static::ordered();

        if (Request::has('id')) {
            $query = $query->where('id', Request::input('id'));
        }
        if (Request::has('title')) {
            $query = $query->where('title', 'like','%' . Request::input('title') . '%');
        }

        return $query->paginate(config('constants.per_page'));
    }
}
