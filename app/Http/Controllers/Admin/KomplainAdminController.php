<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KomplainAdminController extends Controller
{
    public function komplains(){
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->get('http://127.0.0.1:8000/api/admin/komplains');
        $result = json_decode((string)$response->getBody(),true);
        $no = 1;
        $result = $result['komplains'];
        // dd($result);
        return view('admin.komplain.index',compact('result','no')); 
    }

    public function komplain($id){
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->get('http://127.0.0.1:8000/api/admin/komplain/'.$id);
        $result = json_decode((string)$response->getBody(),true);
        $no = 1;
        $komplain = $result['komplain'];
        $balasan = $result['balasan'];
        // dd($komplain);
        return view('admin.komplain.detail',compact('komplain','balasan','no'));
    }

    public function balasan(Request $request, $id_komplain_saran, $id_user){
        // dd($request);
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/admin/komplain/balasan/'.$id_komplain_saran.'/'.$id_user,[
            'balasan'=>$request->balasan,
            'status'=>$request->status
        ]);
        return back();
    } 

    public function updateBalasan(Request $request, $id_balasan, $id_user){
        // dd($request);
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/admin/komplain/balasan/update/'.$id_balasan.'/'.$id_user,[
            'balasan'=>$request->balasan,
            'id_user'=>$id_user,
            'id_balasan'=> $id_balasan,
            'status'=>$request->status
        ]);
        return back()->with('info','Data berhasil diupdate');
    }
}
