@extends('user.profil.master')
@section('konten')
    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
            <span class="mask  bg-gradient-primary  opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        @if ($result['gambar'] != null)
                        <img src="{{ 'http://127.0.0.1:8000/images/'.$img }}" alt="img" class="w-100 border-radius-lg shadow-sm">
                        @else
                        <img src="{{ asset('assets/img/user.png') }}" alt="img" class="w-100 border-radius-lg shadow-sm">
                        @endif
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $result['name'] }}
                        </h5>
                        @if ($result['posisi'] != null)
                        <p class="mb-0 font-weight-normal text-sm">
                            {{ $result['posisi'] }}
                        </p>
                        @endif                     
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-12 col-xl-12">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-0">Informasi</h6>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#profilModal">
                                            <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit Profile"></i>
                                        </a>
                                    </div>
                                    <div class="modal fade" id="profilModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Profil Anda</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('user.update',session()->get('user')['id']) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group bmd-form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text"><i
                                                                            class="material-icons">person</i></div>
                                                                </div>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nama Panjang" name="name" style="max-width: 90%" value="{{ $result['name'] }}">
                                                            </div>
                                                        </div>
                                                        <hr class="mt-0 ">
                                                        <div class="form-group bmd-form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text"><i
                                                                            class="material-icons">mail</i></div>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="Email" name="email"
                                                                    style="max-width: 90%" value="{{ $result['email'] }}">
                                                            </div>
                                                        </div>
                                                        <hr class="mt-0 ">    
                                                        <div class="form-group bmd-form-group">
                                                          <div class="input-group">
                                                              <div class="input-group-prepend">
                                                                  <div class="input-group-text"><i
                                                                          class="material-icons">password</i></div>
                                                              </div>
                                                              <input value="{{ session()->get('user')['passUser'] }}" class="form-control" type="hidden" id="old_password" name="old_password">
                                                              <input type="password" class="form-control" placeholder="Password - Kosongkan Jika Tidak Ingin Mengganti Password"
                                                                  name="password" style="max-width: 90%">
                                                          </div>
                                                      </div>
                                                      <hr class="mt-0 ">                                               
                                                        <div class="form-group bmd-form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text"><i
                                                                            class="material-icons">image</i></div>
                                                                </div>
                                                                <input type="file" name="gambar">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-success">Kirim</button>
                                                    </div>
                                                </form>                                     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <p class="text-sm">
                                    Berikut ini merupakan profil data diri anda. Anda dapat mengubah data dengan klik tombol
                                    di edit sebelah kanan yang berbentuk logo edit. Jika ada data yang tidak ingin diubah
                                    silahkan kosongkan saja.
                                </p>
                                <hr class="horizontal gray-light my-1">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nama
                                            Panjang:</strong> &nbsp; {{ $result['name'] }}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Email:</strong> &nbsp; {{ $result['email'] }}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Level:</strong> &nbsp; {{ $result['level'] }}</li>
                                    @if ($result['posisi'] != null)
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Posisi:</strong> &nbsp; {{ $result['posisi'] }}</li>
                                    @endif                             
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('alert.alert-dismissible')
        </div>
    </div>
@endsection
