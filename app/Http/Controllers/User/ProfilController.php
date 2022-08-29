<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use File;
use Image;

class ProfilController extends Controller
{
    public function profil($id){
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->get('http://127.0.0.1:8000/api/user/profil/'.$id);
        $result = json_decode((string)$response->getBody(),true);
        $img = $result['imgProfil'];
        
        if ($img != null) {
            $user = session('user');
            $user['xgbr'] = $img;
            session(['user'=>$user]);
        }
        $result = $result['user'];
        // dd($img);
        return view('user.profil.profil',compact('result','img'));
    }

    public function update(Request $request, $id){
        // dd($request);
        $token = session()->get('user')['token'];
        // $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/user/profil/update/'.$id,[
        //    'name'=>$request->name,
        //    'email'=>$request->email,
        //    'password'=>$request->password,
        //    'old_password'=>$request->old_password,
        // ]);
        if ($request->gambar != null) {
            
            $photo = fopen($request->gambar, 'r');
            $response = Http::withToken($token)->attach( 'gambar', $photo, 'photo.jpg')->post('http://127.0.0.1:8000/api/user/profil/update/'.$id,[
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'old_password'=>$request->old_password,
            ]);
            return back()->with('info','Update data berhasil');
        }
        else {
            $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/user/profil/update/'.$id,[
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'old_password'=>$request->old_password,
            ]);
            return back()->with('info','Update data berhasil');
        }

        $user = session('user');
        $user['name'] = $request->name;
        $user['email'] = $request->email;
        // if ($request->gambar != null) {
        //     $user['gambar'] = $request->gambar;
        // }
        session(['user'=>$user]);
        // return back();
    }

}
