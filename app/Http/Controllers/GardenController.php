<?php

namespace App\Http\Controllers;

use App\Garden;
use App\Http\Resources\GardenCollection;
use App\Http\Resources\PlantCollection;
use Illuminate\Http\Request;
use App\Http\Resources\Garden as GardenResource;

class GardenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Garden::with('plants')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Garden::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Garden  $garden
     * @return \Illuminate\Http\Response
     */
    public function show(Garden $garden)
    {
        // return new GardenResource($garden);
        return $garden;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Garden  $garden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Garden $garden)
    {
        $garden->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Garden  $garden
     * @return \Illuminate\Http\Response
     */
    public function destroy(Garden $garden)
    {
        $garden->delete();
    }
}
