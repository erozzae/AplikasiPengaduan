@extends('master')
@section('hlm_jdl')
    Pengaduan
@endsection
@section('head')
    <style>
        .detail-btn{
            cursor: pointer;
        }
        .detail-btn:hover{
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
                            <h6 class="text-white text-capitalize ps-3">Pengaduan Saya</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table data-table col-4 align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nomor</th>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jenis Pengaduan</th>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Judul Pengaduan</th>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Detail</th>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $r)
                                    <tr>
                                        <td class="text-center">
                                             <p for="" class="text-xs text-secondary mb-0">{{ $no++ }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p for="" class="text-xs text-secondary mb-0">{{ $r['jenis'] }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p for="" class="text-xs text-secondary mb-0">{{ $r['judul_komplain_saran'] }}</p>
                                        </td>
                                        <td class="text-center" style="">
                                            <a href="{{ route('user.komplain',$r['id_komplain_saran']) }}" class="detail-btn badge badge-sm bg-gradient-info">Detail</a>
                                        </td>
                                        <td class="text-center">
                                         @if ($r['status'] != null)
                                            @if ($r['status']=='diajukan')
                                            <span class="badge badge-sm bg-gradient-warning">Diajukan</span>   
                                            @elseif($r['status']=='diterima')
                                            <span class="badge badge-sm bg-gradient-info">Diterima</span>   
                                            @elseif($r['status']=='ditolak')
                                            <span class="badge badge-sm bg-gradient-danger">Ditolak</span> 
                                            @elseif($r['status']=='diproses')
                                            <span class="badge badge-sm bg-gradient-info">Diproses</span> 
                                            @elseif($r['status']=='selesai')
                                            <span class="badge badge-sm bg-gradient-success">Selesai</span> 
                                            @endif
                                        @elseif($r['status'] == null)
                                        <span class="badge badge-sm bg-gradient-warning">Diajukan</span>       
                                        @endif
                                               
                                        </td>
                                    </tr>
                                    @endforeach                          
                                </tbody>
                            </table>
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
