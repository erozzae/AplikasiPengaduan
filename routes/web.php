<?php

use Illuminate\Support\Facades\Route;
//controller
//auth
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
//Admin
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KomplainAdminController;
use App\Http\Controllers\Admin\QnAAdminController;
//user
use App\Http\Controllers\User\ProfilController;
use App\Http\Controllers\User\komentarController;
use App\Http\Controllers\User\ForumController;
use App\Http\Controllers\User\BerandaController;
use App\Http\Controllers\User\KomplainController;
use App\Http\Controllers\User\QnAController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('user.beranda');
// });

// Route::get('/post',[ForumController::class,'post'])->name('forum.post');

// Route::get('/komentar',[KomentarController::class,'komentar'])->name('komentar');
// Route::view('/register','auth.register')->name('auth.register');



Route::view('/komplain','user.komplain.index')->name('komplain');
Route::view('/landing_page','landing_page.index')->name('landing_page');
Route::view('/research','research');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::group(['namespace'=>'Auth','prefix'=>'auth'],function(){
    Route::post('beranda',[LoginController::class,'login'])->name('auth.login');
    Route::get('logout',[LogoutController::class,'logout'])->name('auth.logout');
    Route::post('register',[RegisterController::class,'register'])->name('auth.register');
    Route::get('beranda',[BerandaController::class,'beranda'])->name('auth.beranda');
});

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'admin'],function(){
    //user
    Route::get('users',[UserController::class,'users'])->name('admin.users');
    Route::get('user/create',[UserController::class,'create'])->name('admin.user.create');
    Route::post('user/store',[UserController::class,'store'])->name('admin.user.store');
    Route::get('user/{id}',[UserController::class,'user'])->name('admin.user');
    Route::get('user/edit/{id}',[UserController::class,'edit'])->name('admin.user.edit');
    Route::post('user/update/{id}',[UserController::class,'update'])->name('admin.user.update');
    Route::post('user/delete/{id}',[UserController::class,'delete'])->name('admin.user.delete');
    //komplain
    Route::get('komplains',[KomplainAdminController::class,'komplains'])->name('admin.komplains');
    Route::get('komplain/{id}',[KomplainAdminController::class,'komplain'])->name('admin.komplain');
    //balasan
    Route::post('komplain/balasan/{id_komplain_saran}/{id_user}',[KomplainAdminController::class,'balasan'])->name('admin.komplain.balasan');
    Route::post('/komplain/balasan/update/{id_balasan}/{id_user}',[KomplainAdminController::class,'updateBalasan'])->name('admin.komplain.balasan.update');
    //qna
    //pertanyaan
    Route::post('qna/pertanyaan/delete/{id_pertanyaan}',[QnAAdminController::class,'deleteTanya'])->name('admin.tanya.delete');
    //jawaban
    Route::post('qna/jawaban/{id_pertanyaan}/{id_user}',[QnAAdminController::class,'storeJawab'])->name('admin.tanya.jawab');
    Route::DELETE('qna/jawaban/delete/{id_jawaban}',[QnAAdminController::class,'deleteJawab'])->name('admin.jawab.delete');
});

Route::group(['namespace'=>'User','prefix'=>'user'],function(){
    Route::get('/profil/{id}',[ProfilController::class,'profil'])->name('user.profil');
    Route::get('/beranda',[BerandaController::class,'beranda'])->name('user.beranda');
    Route::post('/profil/update/{id}',[ProfilController::class,'update'])->name('user.update');
    //komplain
    Route::post('/komplain/store/{id}',[KomplainController::class,'store'])->name('user.komplain.store')->middleware(['notAdmin']);
    Route::get('/komplain/create',[KomplainController::class,'create'])->name('user.komplain.create')->middleware(['notAdmin']);
    Route::get('/komplain/usersKomplain/{id_user}',[KomplainController::class,'usersKomplain'])->name('user.komplain.usersKomplain')->middleware(['notAdmin']);
    Route::get('komplain/{id}',[KomplainController::class,'komplain'])->name('user.komplain')->middleware(['notAdmin']);
    //qna
    Route::get('qna',[QnAController::class,'allQna'])->name('user.qna');
    //pertanyaan
    Route::post('/pertanyaan/store/{id_user}',[QnAController::class,'store'])->name('user.tanya.store')->middleware(['notAdmin']);
    //forum
    Route::get('/forum/posts',[ForumController::class,'index'])->name('user.forum.index');
    Route::get('forum/{id_postingan}',[ForumController::class,'forum'])->name('user.forum');
    //postingan
    Route::post('/postingan/store/{id_user}',[ForumController::class,'storePost'])->name('user.post.store');
    Route::get('/postingan/edit/{id_postingan}',[ForumController::class,'editPost'])->name('user.post.edit');
    Route::post('/postingan/update/{id_postingan}',[ForumController::class,'updatePost'])->name('user.post.update');
    Route::post('/postingan/delete/{id_postingan}',[ForumController::class,'deletePost'])->name('user.post.delete');
    Route::post('/postingan/dtl/delete/{id_postingan}',[ForumController::class,'deleteDetailPost'])->name('user.post.dtl.delete');
    //komentar
    Route::post('komentar/store/{id_user}/{id_postingan}',[ForumController::class,'storeKomen'])->name('user.komen.store');
    Route::post('komentar/delete/{id_komen}',[ForumController::class,'deleteKomen'])->name('user.komen.delete');
  
});
