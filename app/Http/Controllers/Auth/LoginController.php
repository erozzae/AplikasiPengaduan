<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $http = new \GuzzleHttp\Client();
        $response = $http->post('http://127.0.0.1:8000/api/auth/login',[
            'headers'=>[
				'Authorization'=>'Bearer'.session()->get('token.access_token')
			],
			'query'=>[
				'email'=>$email,
				'password'=>$password
			]
        ]);
        $result = json_decode((string)$response->getBody(),true);
        if($result['response']==true){
            //Get value
			$idUser = $result['user']['id'];
			$name = $result['user']['name'];
            $emailUser= $result['user']['email'];
			$level = $result['user']['level'];
            $posisi = $result['user']['posisi'];
			$token = $result['accessToken'];
			$passUser = $result['userPass'];
            $xgbr = $result['user']['gambar'];
            $gambar = $result['imgProfil'];
         

			//session
			session()->put('user',['id'=>$idUser,'name'=>$name,'level'=>$level,'posisi'=>$posisi,'gambar'=>$gambar,'token'=>$token,'email'=>$emailUser,'passUser'=>$passUser,'xgbr'=>$xgbr]);
            // dd($result);
			return view('user.beranda');
        }
        else {
            return back()->with('error','login gagal');
        }
    }
}
