<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Image;
// use Carbon\Carbon;

class UserController extends Controller
{
    public function users(){
    
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->get('http://127.0.0.1:8000/api/admin/users');
        $result = json_decode((string)$response->getBody(),true);
        $result = $result['users'];
        // dd($result);
        return view('admin.users.index',compact('result'));
    }
    
    public function user(){
        return view('admin.users.edit');
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request){
        // dd($request);
        $token = session()->get('user')['token'];
        if ($request->gambar != null) {
            $photo = fopen($request->gambar, 'r');
            $response = Http::withToken($token)->attach( 'gambar', $photo, 'photo.jpg')->post('http://127.0.0.1:8000/api/admin/user/store',[
                'name' => $request->name,
                'email'=> $request->email,
                'password'=>$request->password,
                'posisi'=>$request->posisi,
                'level'=>$request->level,
            ]);
            return back()->with('success','Data berhasil Ditambahkan');
        }
        else {
            $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/admin/user/store',[
                'name' => $request->name,
                'email'=> $request->email,
                'password'=>$request->password,
                'posisi'=>$request->posisi,
                'level'=>$request->level,
            ]);
            return back()->with('success','Data berhasil Ditambahkan');
        }
       
    }

    public function edit($id){
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->get('http://127.0.0.1:8000/api/user/profil/'.$id);
        $result = json_decode((string)$response->getBody(),true);
        $result = $result['user'];
        // dd($result);
        return view('admin.users.edit',compact('result'));
    }
    
    public function update(Request $request, $id){
        // dd($request);
        $token = session()->get('user')['token'];
        if ($request->gambar != null) {
            $photo = fopen($request->gambar, 'r');
            $response = Http::withToken($token)->attach( 'gambar', $photo, 'photo.jpg')->post('http://127.0.0.1:8000/api/admin/user/update/'.$id,[
                'name' => $request->name,
                'email'=> $request->email,
                'password'=>$request->password,
                'posisi'=>$request->posisi,
                'level'=>$request->level,
            ]);
            return back()->with('info','Update data berhasil');;
        }
        else {
            $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/admin/user/update/'.$id,[
                'name' => $request->name,
                'email'=> $request->email,
                'password'=>$request->password,
                'posisi'=>$request->posisi,
                'level'=>$request->level,
            ]);
            return back()->with('info','Update data berhasil');
        }
    }

    public function delete($id){
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/admin/user/delete/'.$id);
        return redirect()->route('admin.users')->with('warning','Data berhasil dihapus');
    }
}
