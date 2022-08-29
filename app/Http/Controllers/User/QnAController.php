<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QnAController extends Controller
{
    public function allQna(){
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->get('http://127.0.0.1:8000/api/user/qna');
        $result = json_decode((string)$response->getBody(),true);
        $result = $result['qna'];
        // dd($result);
        return view('user.qna.index',compact('result'));
    }
    public function store(Request $request,$id){
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/user/pertanyaan/store/'.$id,[
           'isi_pertanyaan'=>$request->isi_pertanyaan
         ]);
         return back();
    }
}
