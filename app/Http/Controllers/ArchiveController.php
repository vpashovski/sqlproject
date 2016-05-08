<?php

namespace App\Http\Controllers;

use App\CarArchive;
use App\OwnerArchive;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArchiveController extends Controller
{
    public function cars()
    {
        $car_archives = CarArchive::paginate(config('constants.per_page'));

        return view('pages.archive.cars', compact('car_archives'));
    }

    public function owners()
    {
        $owner_archives = OwnerArchive::paginate(config('constants.per_page'));

        return view('pages.archive.owners', compact('owner_archives'));
    }
}
