<?php
namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ForumController extends Controller
{

    public function index(){
        // return view('user.forum.index');
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->get('http://127.0.0.1:8000/api/user/forum/posts');
        $result = json_decode((string)$response->getBody(),true);
        $result = $result['posts'];
        
        return view('user.forum.index',compact('result'));
    }

    public function forum($id_postingan){
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->get('http://127.0.0.1:8000/api/user/forum/detail/'.$id_postingan);
        $result = json_decode((string)$response->getBody(),true);
        $post = $result['post'];
        // $komen = $result['komen'];
        // dd($result);
        return view('user.forum.detail_post',compact('post'));
    }

    public function post(){
        return view('user.forum.detail_post');
    }

    public function storePost(Request $request, $id_user){
        // $input = $request->all();
        // dd($input);
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/user/postingan/store/'.$id_user,[
           'isi_postingan'=>$request->isi_postingan
         ]);
         return back();
    }

    public function editPost($id_postingan){
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->get('http://127.0.0.1:8000/api/user/forum/detail/'.$id_postingan);
        $result = json_decode((string)$response->getBody(),true);
        $post = $result['post'];
        
        return view('user.forum.edit',compact('post'));
    }

    public function updatePost(Request $request, $id_postingan){
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/user/postingan/update/'.$id_postingan,[
           'isi_postingan'=>$request->isi_postingan
         ]);
         return redirect()->route('user.forum',$id_postingan)->with('info','Data berhasil diupdate');
    }

    public function deletePost($id_postingan){
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/user/postingan/delete/'.$id_postingan);
        return back()->with('warning','Data berhasil dihapus');
    }
    
    public function deleteDetailPost($id_postingan){
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/user/postingan/delete/'.$id_postingan);
        return redirect()->route('user.forum.index')->with('warning','Data berhasil dihapus');
    }
    public function storeKomen(Request $request, $id_user, $id_postingan){
        // $req = $request->all();
        // dd($req);
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/user/komentar/store/'.$id_user.'/'.$id_postingan,[
           'isi_komentar'=>$request->isi_komentar
         ]);
         return back();
    }

    public function deleteKomen($id_komen){
        $token = session()->get('user')['token'];
        $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/user/komentar/delete/'.$id_komen);
         return back()->with('warning','Data berhasil dihapus');
    }
}
