<?php

namespace App;

use Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;

    protected $table = 'cars';

    protected $dates = ['deleted_at'];

    protected $fillable = ['brand', 'model', 'number', 'image_id', 'in_garage'];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function owners()
    {
        return $this->belongsToMany(Owner::class, 'owner_car');
    }

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
        if (Request::has('in_garage')) {
            $query = $query->where('in_garage', Request::input('in_garage'));
        }

        return $query->paginate(config('constants.per_page'));
    }
}
