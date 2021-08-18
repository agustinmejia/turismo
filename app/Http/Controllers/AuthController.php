<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

// Models
use App\Models\User;

class AuthController extends Controller
{
    public function register_store(Request $request){
        // dd($request);
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => 2,
                'phone' => $request->phone
            ]);

            // Loguear
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
            }
            return redirect()->route('voyager.dashboard')->with(['message' => 'Registro realizado exitosamente', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('register')->with(['message' => 'Ocurrió un error', 'alert-type' => 'error']);
        }
    }
}
