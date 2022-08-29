<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(){
        $http = new \GuzzleHttp\Client();
        $token = session()->get('user')['token'];
		$logout = Http::withToken($token)->post('http://127.0.0.1:8000/api/auth/logout');
		$result = json_decode((string)$logout->getBody(),true);
        return redirect()->to('/');
    }
}
