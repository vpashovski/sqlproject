<?php

namespace App\Http\Controllers;

use App\OtherAction;
use App\Image;
use Illuminate\Http\Request;

use App\Http\Requests;

class OtherActionController extends Controller
{
    public function storedProcedure(Request $request)
    {
        $results = OtherAction::callGetOwnersProcedure();

        return view('pages.other.stored_procedure', compact('results'));
    }

    public function getUsedImages()
    {
        $results = [];
        $images = OtherAction::getUsedImages();

        foreach($images as $image) {
            $results[] = [
                'id'            => $image->id,
                'url'           => Image::find($image->id)->url,
                'title'         => $image->title,
                'ext'           => $image->ext,
                'created_at'    => $image->created_at,
                'updated_at'    => $image->updated_at,
            ];
        }

        return view('pages.other.used_images', compact('results'));
    }
}
