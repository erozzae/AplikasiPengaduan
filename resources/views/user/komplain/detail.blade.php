@extends('master')

@section('hlm_jdl')
    Detail Pengaduan
@endsection

@section('head')
    <style>
        .download-btn {
            cursor: pointer;
        }

        .download-btn:hover {
            color: #fff
        }
    </style>
@endsection

@section('konten')
    <div class="container-fluid py-4 ps-0">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Detail Pengaduan</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="row mx-3 mb-2">
                            <div class="col">
                                <p class="mt-0 mb-0 text-sm fw-bolder">Jenis Pengaduan</p>
                            </div>
                            <div class="col">
                                <p class="mt-0 mb-0 text-xs">{{ $komplain['jenis'] }}</p>
                            </div>
                        </div>
                        <hr class="mt-0 mb-2 mx-3">
                        <div class="row mx-3 mb-2">
                            <div class="col">
                                <p class="mt-0 mb-0 text-sm fw-bolder">Judul Pengaduan</p>
                            </div>
                            <div class="col">
                                <p class="mt-0 mb-0 text-xs">{{ $komplain['judul_komplain_saran'] }}</p>
                            </div>
                        </div>
                        <hr class="mt-0 mb-2 mx-3">
                        <div class="row mx-3 mb-2">
                            <div class="col">
                                <p class="mt-0 mb-0 text-sm fw-bolder">Email Yang Dapat Dihubungi</p>
                            </div>
                            <div class="col">
                                <p class="mt-0 mb-0 text-xs">{{ $komplain['email'] }}</p>
                            </div>
                        </div>
                        <hr class="mt-0 mb-2 mx-3">
                        <div class="row mx-3 mb-2">
                            <div class="col">
                                <p class="mt-0 mb-0 text-sm fw-bolder">Gambar</p>
                            </div>
                            <div class="col">
                                <img class="img-fluid mt-0 mb-0" src="{{ 'http://127.0.0.1:8000/images/'.$komplain['gambar'] }}">
                            </div>
                        </div>
                        <hr class="mt-0 mb-2 mx-3">
                        <div class="row mx-3 mb-2">
                            <div class="col">
                                <p class="mt-0 mb-0 text-sm fw-bolder">Download Gambar</p>
                            </div>
                            <div class="col">
                                <a class="mt-0 mb-0 badge badge-sm bg-gradient-info download-btn"
                                    href="{{ asset('assets/img/home-decor-1.jpg') }}" download>Download</a>
                            </div>
                        </div>
                        <hr class="mt-0 mb-2 mx-3">
                        <div class="row mx-3 mb-2">
                            <div class="col">
                                <p class="mt-0 mb-0 text-sm fw-bolder">Isi Pengaduan</p>
                            </div>
                            <div class="col">
                                <p class="mt-0 mb-0 text-xs">{{ $komplain['isi_komplain_saran'] }}</p>
                            </div>
                        </div>
                        <hr class="mt-0 mb-2 mx-3">
                        <div class="row mx-3 mb-2">
                            <div class="col">
                                <p class="mt-0 mb-0 text-sm fw-bolder">Keterangan Balasan</p>
                            </div>
                            <div class="col">
                                @if ($balasan != null)
                                <p class="mt-0 mb-0 text-xs">{{ $balasan['balasan'] }}</p>
                                @endif                   
                            </div>
                        </div>
                        <hr class="mt-0 mb-2 mx-3">
                        <div class="row mx-3 mb-2">
                            <div class="col">
                                <p class="mt-0 mb-0 text-sm fw-bolder">Status</p>
                            </div>
                            <div class="col">
                                @if ($balasan != null)
                                    @if ($balasan['status']=='diajukan')
                                    <span class="badge badge-sm bg-gradient-warning">Diajukan</span>   
                                    @elseif($balasan['status']=='diterima')
                                    <span class="badge badge-sm bg-gradient-info">Diterima</span>   
                                    @elseif($balasan['status']=='ditolak')
                                    <span class="badge badge-sm bg-gradient-danger">Ditolak</span> 
                                    @elseif($balasan['status']=='diproses')
                                    <span class="badge badge-sm bg-gradient-info">Diproses</span> 
                                    @elseif($balasan['status']=='selesai')
                                    <span class="badge badge-sm bg-gradient-success">Selesai</span> 
                                    @endif
                                @else
                                <span class="badge badge-sm bg-gradient-warning">Diajukan</span>   
                                @endif                              
                            </div>
                        </div>
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
