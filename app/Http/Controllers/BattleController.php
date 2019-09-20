<?php

namespace App\Http\Controllers;

use App\Battle;
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
        // $this->middleware('auth');
    }

    public function apiLogin(Request $request){
        // $credentials = $request->only('email', 'password');
        $email = $request->email;
        $password = $request->password;
        dd(Auth::check(['email' => $email, 'password' => $password]));

        if (Auth::attempt(['email' => $email, 'password', $password])) {
            dd('holi');
            // Authentication passed...
            // return redirect()->intended('dashboard');
            return response()->json([
                'user' => Auth::once($credentials),
                'status' => 'success',
                'desc' => 'Usuario loggeado'
            ]);
        }
    }

    public function index()
    {
        //
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
                'battle' => $request,
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
