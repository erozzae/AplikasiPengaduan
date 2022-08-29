<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    
    public function register(Request $request){
      
        $response = Http::post('http://127.0.0.1:8000/api/auth/register',[
            'name' => $request->name,
            'email'=> $request->email,
            'password'=>$request->password,
        ]);
        return  redirect()->route('register')->with('success','Pendaftaran berhasil, silahkan login kembali');
    }
}
