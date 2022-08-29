@extends('master')
@section('hlm_jdl')
    Tambah Pengaduan
@endsection
@section('konten')
<div class="container-fluid py-4 ps-0">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Buat Pengaduan</h6>
                    </div>
                </div>
                <div class="card-body  pb-2">
                    @include('alert.alert-dismissible')
                    <br>
                    <form action="{{ route('user.komplain.store', session('user')['id']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <label for="">Judul Pengaduan :</label>
                        </div>    
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Masukan Judul</label>
                            <input type="text" class="form-control" name="judul_komplain_saran">
                        </div>
                        <div>
                            <label for="">Isi Pengaduan :</label>
                        </div> 
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Masukan Isi Pengaduan</label>
                            <input type="text" class="form-control" name="isi_komplain_saran">
                        </div>
                        <div>
                            <label for="">Email :</label>
                        </div> 
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Email yang Dapat Dihubungi</label>
                            <input type="mail" class="form-control" name="email">
                        </div>
                        <div>
                            <label for="">Jenis Pengaduan :</label>
                        </div> 
                        <div class="input-group input-group-outline mb-3">
                            <select class="form-control" name="jenis">
                                <option value="Pengaduan Aplikasi">Pengaduan Aplikasi</option>
                                <option value="Konsultasi">Konsultasi</option>
                                <option value="Layanan">Layanan</option>
                            </select>
                        </div>
                        <div class=" ps-0" style="display: inline-block">
                            <div class="div">
                             <label  style="float: left">
                                 Tambah Gambar
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
                                class="btn btn-lg bg-gradient-info btn-lg w-100 mt-2 mb-0">Kirim</button>
                        </div>                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection