<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QnAAdminController extends Controller
{
    public function storeJawab(Request $request, $id_pertanyaan,$id_user){
        // dd($request);
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/admin/jawaban/'.$id_pertanyaan.'/'.$id_user,[
            'isi_jawaban'=>$request->isi_jawaban
        ]);
        return redirect()->route('user.qna')->with('success','Data berhasil ditambahkan');
    }

    public function deleteTanya($id_pertanyaan){
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/admin/pertanyaan/delete/'.$id_pertanyaan);
        return back()->with('warning','Data berhasil dihapus');
    }
    public function deleteJawab($id_jawaban){
        // dd($id_jawaban);
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->DELETE('http://127.0.0.1:8000/api/admin/jawaban/delete/'.$id_jawaban);
        return back()->with('warning','Data berhasil dihapus');
    }
}
