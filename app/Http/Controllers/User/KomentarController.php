<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function komentar(){
        return view('user.qna.index');
    }
}
