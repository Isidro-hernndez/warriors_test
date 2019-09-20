<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class ApiTokenController extends Controller
{
    public function update(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $email = $request->email;
        $user = null;
        $status = 'error';
        $desc = 'Error de acceso';
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = User::where('email', $email)->get()->first();
            // dd($user);
            
            $token = Str::random(60);
            
            
            // dd($user);

            // $request->user()->forceFill([
            //     'api_token' => hash('sha256', $token),
            // ])->save();
            $user->forceFill([
                'api_token' => hash('sha256', $token),
            ])->save();

            $auth = Auth::guard('api');
            $auth = Auth::login($user);
            $user = Auth::user();
            $status = 'success';
            $desc = 'Usuario loggeado';

            
        }
        return response()->json([
            'user' => $user,
            'status' => $status,
            'desc' => $desc
        ]);
        
    }
}
