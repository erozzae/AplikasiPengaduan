<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use File;
use Image;

class KomplainController extends Controller
{
    public function create(){
        return view('user.komplain.create');
    }
    public function store(Request $request, $id){
        $token = session()->get('user')['token'];
        // dd($request->all());
        if ($request->gambar !== null) {
            $photo = fopen($request->gambar, 'r');
            $response = Http::withToken($token)->attach( 'gambar', $photo, 'photo.jpg')->post('http://127.0.0.1:8000/api/user/komplain/store/'.$id,[
                'judul_komplain_saran'=>$request->judul_komplain_saran,  
                'isi_komplain_saran'=>$request->isi_komplain_saran,
                'email'=>$request->email,
                'jenis'=>$request->jenis,       
             ]);
             return redirect()->route('auth.beranda')->with('success','Komplain berhasil ditambahkan');
        }
        elseif ($request->gambar == null) {
            $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/user/komplain/store/'.$id,[
                'judul_komplain_saran'=>$request->judul_komplain_saran,  
                'isi_komplain_saran'=>$request->isi_komplain_saran,
                'email'=>$request->email,
                'jenis'=>$request->jenis,       
             ]);
             return redirect()->route('auth.beranda')->with('success','Komplain berhasil ditambahkan');
        }
       
    }

    public function usersKomplain($id_user){
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->get('http://127.0.0.1:8000/api/user/komplain/usersKomplain/'.$id_user);
        $result = json_decode((string)$response->getBody(),true);
        $result = $result['users komplain'];
        $no = 1;
        // dd($result);
        return view('user.komplain.index',compact('result','no'));
    }

    public function komplain($id){
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->get('http://127.0.0.1:8000/api/user/komplain/'.$id);
        $result = json_decode((string)$response->getBody(),true);
        // dd($result);
        $komplain = $result['komplain'];
        $balasan = $result['balasan'];
        return view('user.komplain.detail',compact('komplain','balasan'));
    }
}
