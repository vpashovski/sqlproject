<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\OwnersToCars;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners_to_cars = OwnersToCars::getFilteredResults();

        return view('pages.home.index', compact('owners_to_cars'));
    }
}
