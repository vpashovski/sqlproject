<?php

namespace App;

use Request;
use DB;

class OtherAction extends Model
{
    public static function callGetOwnersProcedure()
    {
        $results = [];

        if (Request::has('firstname')) {
            $fname = Request::input('firstname');
            DB::statement('SET @fname = \'' . $fname . '\'');
            $results = DB::select('CALL `getOwners`(@fname)');
        }

        return $results;
    }

    public static function getUsedImages()
    {
        return DB::select('SELECT * FROM `images` as i WHERE i.id IN (SELECT image_id FROM owners) OR i.id IN (SELECT image_id FROM cars)');
    }
}
