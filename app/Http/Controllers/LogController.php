<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Logs;

class LogController extends Controller
{
    public function index()
    {
        $logs = Logs::getFilteredResults();

        return view('pages.logs.index', compact('logs'));
    }
}
