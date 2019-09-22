<?php

namespace App\Http\Controllers;

use App\Battle;
use App\Warrior;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BattleController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('auth:api');
    }
    
    public function index()
    {
        return view('warriors.admin');
    }

    public function getAll(){
        $user = Auth::user();
        $nullWarrior = (Object)[
            'name' => 'N/A',
            'skills' => 0,
            'strenght' => 0,
            'speed' => 0
        ];
        $battles = Battle::select('battles.*', 'warriors_useds.name as used_name', 'warriors_foughts.name as fought_name')->where('user_id', $user->id)
            ->orderBy('date', 'DESC')
            ->join('warriors as warriors_useds', 'battles.warrior_used', '=', 'warriors_useds.id')
            ->join('warriors as warriors_foughts', 'battles.warrior_fought', '=', 'warriors_foughts.id');
        
        $total_win = $battles->get()->isNotEmpty() ?  $battles->get()->where('result', 'win')->values() : [];
        $total_loose = $battles->get()->isNotEmpty() ? $battles->get()->where('result', 'loose')->values() : [];
        $total_tie = $battles->get()->isNotEmpty() ? $battles->get()->where('result', 'tie')->values() : [];
        $best_warrior = $battles->get()->isNotEmpty() ? Warrior::find($total_win->groupBy('warrior_used')->max()->first()->warrior_used) : $nullWarrior;
        $worst_warrior = $battles->get()->isNotEmpty() ? Warrior::find($total_loose->groupBy('warrior_used')->max()->first()->warrior_used) : $nullWarrior;
        // dd($total_loose->values());
        return response()->json([
            'battles' => $battles->get(),
            'win' => $total_win,
            'loose' => $total_loose,
            'tie' => $total_tie,
            'best_warrior' => $best_warrior,
            'worst_warrior' => $worst_warrior,
            'status' => 'success',
            'desc' => $battles->get()->isNotEmpty() ? 'Lista de batallas jugadas' : 'No hay registros'
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if($user) {
            $battle = new Battle;
            $battle->warrior_used = $request->warrior_used;
            $battle->warrior_fought = $request->warrior_fought;
            $battle->result = $request->result;  
            $battle->user_id = $user->id;
            $battle->date = date("Y-m-d H:i:s");
            $battle->save();

            return response()->json([
                'battle' => $battle,
                'status' => 'success',
                'desc' => 'Batalla guardada'
            ]);
        }else{
            return response()->json([
                'battle' => $user,
                'status' => 'error',
                'desc' => 'Batalla no guardada'
            ]);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Battle  $battle
     * @return \Illuminate\Http\Response
     */
    public function show(Battle $battle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Battle  $battle
     * @return \Illuminate\Http\Response
     */
    public function edit(Battle $battle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Battle  $battle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Battle $battle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Battle  $battle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Battle $battle)
    {
        //
    }
}
