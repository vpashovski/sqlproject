<?php

namespace App\Http\Controllers;

use App\OtherAction;
use Illuminate\Http\Request;

use App\Http\Requests;

class OtherActionController extends Controller
{
    public function storedProcedure(Request $request)
    {
        $results = OtherAction::callGetOwnersProcedure();

        return view('pages.other.stored_procedure', compact('results'));
    }
}
