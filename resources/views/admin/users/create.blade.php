{{-- <!--
=========================================================
* Material Dashboard 2 - v3.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>
        Material Dashboard 2 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.0.1') }}" rel="stylesheet" />
</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                                style="background-image: url('https://c0.wallpaperflare.com/preview/379/493/189/concept-development-device-flat.jpg'); background-size: cover;background-position:center center;">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                            <div class="card card-plain">
                                <div class="card-header">
                                    <h4 class="font-weight-bolder">Register</h4>
                                    <p class="mb-0">Masukkan email dan kata sandi User untuk mendaftar</p>
                                </div>
                                <div class="card-body">
                                    <form role="form">
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="">
                                            <label for="">Level :</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="level"
                                                    value="user" checked>
                                                <label class="form-check-label">
                                                    user
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="level"
                                                    value="admin">
                                                <label class="form-check-label">
                                                    admin
                                                </label>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="button"
                                                class="btn btn-lg bg-gradient-info btn-lg w-100 mt-4 mb-0">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.1') }}"></script>
</body>

</html> --}}

@extends('master')
@section('hlm_jdl')
    Form Tambah User
@endsection
@section('konten')
    <div class="container-fluid py-5 ps-0">
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Tambah User</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('alert.alert-dismissible')
                        <br>
                        <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <label for="">Nama :</label>
                            </div>    
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Masukan nama</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div>
                                <label for="">Email :</label>
                            </div> 
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Silahkan masukan email yang akan digunakan</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div>
                                <label for="">Password :</label>
                            </div> 
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="">Level :</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="level" value="user" checked>
                                    <label class="form-check-label">
                                        user
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="level" value="admin">
                                    <label class="form-check-label">
                                        admin
                                    </label>
                                </div>
                            </div>
                            <div>
                                <label for="">Posisi :</label>
                            </div> 
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Jika level bukan admin, kosongkan saja</label>
                                <input type="text" class="form-control"
                                    name="posisi">
                            </div>
                            <div class=" ps-0" style="display: inline-block">
                                <div class="div">
                                 <label  style="float: left">
                                     Tambah Foto
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
                                    class="btn btn-lg bg-gradient-info btn-lg w-100 mt-2 mb-0">Register</button>
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
