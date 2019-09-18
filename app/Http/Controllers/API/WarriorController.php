<?php

namespace App\Http\Controllers\API;

use App\Warrior;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WarriorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warriors = Warrior::all();

        return response()->json([
            'warriors' => $warriors,
            'status' => 'success',
            'desc' => 'Lista de guerrerors'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Warrior  $warrior
     * @return \Illuminate\Http\Response
     */
    public function show(Warrior $warrior)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Warrior  $warrior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warrior $warrior)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warrior  $warrior
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warrior $warrior)
    {
        //
    }
}
