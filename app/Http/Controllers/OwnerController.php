<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Owner;
use App\Car;
use App\Http\Controllers\Controller;
use App\Http\Requests\OwnerRequest;
use Auth;

class OwnerController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->redirectRoute = 'owner.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = Owner::getFilteredResults();

        return view('pages.owner.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = $this->getCars();

        return view('pages.owner.create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $owner = Owner::create($request->all());
        $owner->cars()->attach(array_filter($request->input('cars')));

        return redirect()->route($this->redirectRoute);
    }

    /**
     * Display the specified resource.
     *
     * @param  Owner $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        return view('pages.owner.show', compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        $cars = $this->getCars();

        return view('pages.owner.edit', compact(['owner', 'cars']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        $owner->update($request->all());
        $owner->cars()->sync(array_filter($request->input('cars')));
        return redirect()->route($this->redirectRoute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Owner $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        $cars_ids = [];
        foreach($owner->cars as $car) {
            $cars_ids[] = $car->id;
        }

        $owner->cars()->detach($cars_ids);
        $owner->delete();

        return redirect()->route($this->redirectRoute);
    }

    private function getCars() {
        $cars = [];
        $all_cars = Car::all();

        foreach($all_cars as $car) {
            $cars[$car->id] = $car->brand . ' - ' . $car->model . ' (' . $car->number . ')';
        }

        return $cars;
    }
}
