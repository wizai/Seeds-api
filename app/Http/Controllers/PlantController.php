<?php

namespace App\Http\Controllers;

use App\Garden;
use App\Http\Resources\PlantCollection;
use App\Plant;
use Illuminate\Http\Request;
use App\Http\Resources\Plant as PlantResource;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PlantCollection(Plant::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Plant::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function show(Plant $plant)
    {
        //return new PlantResource($plant);
        return $plant;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plant $plant)
    {
        $plant->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plant $plant)
    {
        $plant->delete();
    }

    public function addPlant(Request $request)
    {
        $garden = Garden::findOrFail($request->get("garden_id"));
        $plant = Plant::findOrFail($request->get("plant_id"));
        if($garden && $plant){
            $garden->plants()->attach($plant);
            $garden->save();
            return $garden->with('plants')->get();
        }
    }

    public function removePlant(Request $request)
    {
        $garden = Garden::findOrFail($request->get("garden_id"));
        $plant = Plant::findOrFail($request->get("plant_id"));
        if(!$garden->plants->isEmpty()) {
            if ($garden && $plant) {
                $garden->plants()->detach($plant);
                $garden->save();
                return null;
            }
        }
    }
}
