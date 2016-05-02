<?php

namespace App\Http\Controllers;

use App\Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use Auth;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->redirectRoute = 'image.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::getFilteredResults();

        if (request()->ajax()) {
            return view('pages.image._search_results', compact('images'));
        }

        return view('pages.image.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
        $image = Image::create($request->all());

        if ($request->ajax()) {
            return response()->json([
                'result'        => 'OK',
                'message'       => 'Created an image',
                'image_id'      => $image->id,
                'image_title'   => $image->title,
                'image_url'     => $image->url,
            ]);
        }

        return redirect()->route($this->redirectRoute);
    }

    /**
     * Display the specified resource.
     *
     * @param  Image $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return view('pages.image.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Image $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return view('pages.image.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ImageRequest  $request
     * @param  Image $image
     * @return \Illuminate\Http\Response
     */
    public function update(ImageRequest $request, Image $image)
    {
        $image->update($request->all());

        return redirect()->route($this->redirectRoute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Image $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->delete();

        return redirect()->route($this->redirectRoute);
    }
}
