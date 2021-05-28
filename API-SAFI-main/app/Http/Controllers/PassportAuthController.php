<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PassportAuthController extends Controller
{
    /**
     * Registration
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'lastname' => 'required|min:4',
            'login' => 'required|min:4',
            'password' => 'required|min:4',
            'district_id' => 'required|min:1',
            ]);
            
            //dd($request);
        $user = User::create([
            'lastname' => $request->lastname,
            'login' => $request->login,
            'password' => bcrypt($request->password),
            'district_id' => $request->district_id,
        ]);
       
        $token = $user->createToken('LaravelAuthApp')->accessToken;
 
        return response()->json(['token' => $token], 200);
    }
 
    /**
     * Login
     */
    public function login(Request $request)
    {
        $data = [
            'login' => $request->login,
            'password' => $request->password
        ];
 
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token' => $token, 'id' => $request->user()->id ], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}