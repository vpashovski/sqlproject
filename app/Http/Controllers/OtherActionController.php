<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class OtherActionController extends Controller
{
    public function storedProcedure(Request $request)
    {
        $results = [];

        if ($request->has('firstname')) {
            $fname = $request->input('firstname');
            DB::statement('SET @fname = \'' . $fname . '\'');
            $results = DB::select('CALL `getOwners`(@fname)');
        } else {
            $fname = '';
        }

        return view('pages.other.stored_procedure', compact('results'));
    }
}
