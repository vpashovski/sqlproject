<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Car;
use App\Owner;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use Auth;

class CarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->redirectRoute = 'car.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::getFilteredResults();

        return view('pages.car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = $this->getOwners();

        return view('pages.car.create', compact('owners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $values = array_map(function($value) {
            return $value === "" ? NULL : $value;
        }, $request->all());

        $car = Car::create($values);
        $car->owners()->attach(array_filter($request->input('owners')));

        return redirect()->route($this->redirectRoute);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('pages.car.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $owners = $this->getOwners();

        return view('pages.car.edit', compact(['car', 'owners']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $values = array_map(function($value) {
            return $value === "" ? NULL : $value;
        }, $request->all());

        $car->update($values);
        $car->owners()->sync(array_filter($request->input('owners')));
        return redirect()->route($this->redirectRoute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $owners_ids = [];
        foreach($car->owners as $owner) {
            $owners_ids[] = $owner->id;
        }

        $car->owners()->detach($owners_ids);
        $car->delete();

        return redirect()->route($this->redirectRoute);
    }

    public function inGarage(Request $request)
    {
        if ($request->has('car_id')) {
            $car = Car::find($request->input('car_id'));
            $car->in_garage = !$car->in_garage;
            $car->save();
        }

        return redirect()->route($this->redirectRoute);
    }

    private function getOwners() {
        $owners = [];
        $all_owners = Owner::all();

        foreach($all_owners as $owner) {
            $owners[$owner->id] = $owner->firstname . ' ' . $owner->lastname . ' (' . $owner->email . ')';
        }

        return $owners;
    }
}
