
@extends('master')
@section('hlm_jdl')
    Form Edit User
@endsection
@section('konten')
    <div class="container-fluid py-5 ps-0">
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Edit User</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('alert.alert-dismissible')
                        <br>
                        <form action="{{ route('admin.user.update',$result['id']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <label for="">Nama :</label>
                            </div>                     
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <input type="text" class="form-control" name="name" value="{{ $result['name'] }}">
                            </div>
                            <div>
                                <label for="">Email :</label>
                            </div>                  
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <input type="email" class="form-control" name="email" value="{{ $result['email'] }}">
                            </div>                      
                            <div class="mb-3">
                                <label for="">Level :</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="level" value="user" @if ($result['level']=='user')
                                        checked
                                    @endif>
                                    <label class="form-check-label">
                                        user
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="level" value="admin" @if ($result['level']=='admin')
                                    checked
                                @endif>
                                    <label class="form-check-label">
                                        admin
                                    </label>
                                </div>
                            </div>
                            <div>
                                <label for="">Posisi :</label>
                            </div>      
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <input type="text" class="form-control"
                                    placeholder="Jika level bukan admin, kosongkan saja" name="posisi" value="{{ $result['posisi'] }}">
                            </div>
                            <div class=" ps-0" style="display: inline-block">
                               <div class="div">
                                <label  style="float: left">
                                    Ganti Foto
                                </label>
                               </div>
                               <div class="div">
                                <button type="button" class="btn btn bg-gradient-success p-2">
                                    <input type="file" name="gambar">Gambar
                                </button>
                               </div>                 
                            </div>                  
                            <div class="text-center">
                                <button type="submit"
                                    class="btn btn-lg bg-gradient-info btn-lg w-100 mt-2 mb-0 ">Simpan</button>
                            </div>                      
                        </form>                                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('sisi_konten')
    <div class="row mb-4">
        <div class="col-lg-12 md-0 mb-4">
            <div class="col-lg-8">
                <div class="card mb-2 mt-5">
                    <div class="card body">
                        <h6 class="fw-bold fs-6 text-center pt-2">Terkait Perusahaan</h6>
                    </div>
                </div>
                <div class="card">
                    <div class="table-responsive py-2">
                        <table class="table align-items-center mb-0">
                            <tr>
                                <div class="text-center mb-2">
                                    <a href="https://www.integraindonesia.co.id/portfolio/">Portofolio</a>
                                </div>
                                <div class="text-center mb-2">
                                    <a href="https://www.integraindonesia.co.id/clients/">Client</a>
                                </div>
                                <div class="text-center">
                                    <a href="https://www.integraindonesia.co.id/berita/">Berita</a>
                                </div>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
