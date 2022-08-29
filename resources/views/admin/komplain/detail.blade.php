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
                        <div class="mx-4">
                            @include('alert.alert-dismissible')
                        </div>
                        <div class="row mx-3 mb-2">
                            @if ($balasan == null)
                                <a class="mt-0 mb-0 badge badge-sm bg-gradient-warning download-btn" href=""
                                    data-bs-toggle="modal" data-bs-target="#prosesKomplainModal">Tindak lanjut</a>
                            @else
                                <a class="mt-0 mb-0 badge badge-sm bg-gradient-warning download-btn" href=""
                                    data-bs-toggle="modal" data-bs-target="#editTindakKomplainModal">Edit Tindak Lanjut</a>
                            @endif

                        </div>
                        <form
                            action="{{ route('admin.komplain.balasan', [$komplain['id_komplain_saran'], $komplain['id_user']]) }}"
                            method="POST">
                            @csrf
                            <div class="modal fade" id="prosesKomplainModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tindak Lanjut</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group bmd-form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i
                                                                class="material-icons">format_align_right</i></div>
                                                    </div>
                                                    <input type="text" class="form-control" name="balasan"
                                                        placeholder="Keterangan Balasan" style="max-width: 90%">
                                                </div>
                                            </div>
                                            <hr class="mt-0">
                                            <div class="input-group input-group-static mb-4">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="material-icons">label</i></div>
                                                </div>
                                                <label class="ms-0"
                                                    style="color: #adb5bd;
                                                  opacity: 1;">Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="diajukan">Diajukan</option>
                                                    <option value="diterima">Diterima</option>
                                                    <option value="ditolak">Ditolak</option>
                                                    <option value="diproses">Diproses</option>
                                                    <option value="selesai">Selesai</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-success">Kirim</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @if ($balasan != null)
                            <form
                                action="{{ route('admin.komplain.balasan.update', [$balasan['id_balasan'], session()->get('user')['id']]) }}"
                                method="POST">
                                @csrf
                                <div class="modal fade" id="editTindakKomplainModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Tindak Lanjut</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text"><i
                                                                    class="material-icons">format_align_right</i></div>
                                                        </div>
                                                        <input type="text" class="form-control" name="balasan"
                                                            placeholder="Keterangan Balasan"
                                                            value="{{ $balasan['balasan'] }}" style="max-width: 90%">
                                                    </div>
                                                </div>
                                                <hr class="mt-0">
                                                <div class="input-group input-group-static mb-4">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="material-icons">label</i>
                                                        </div>
                                                    </div>
                                                    <label class="ms-0"
                                                        style="color: #adb5bd;
                                              opacity: 1;">Status</label>
                                                    <select class="form-control" name="status">
                                                        <option value="diajukan"
                                                            @if ($balasan['status'] == 'diajukan') selected @endif>
                                                            Diajukan</option>
                                                        <option value="diterima"
                                                            @if ($balasan['status'] == 'diterima') selected @endif>
                                                            Diterima</option>
                                                        <option value="ditolak"
                                                            @if ($balasan['status'] == 'ditolak') selected @endif>
                                                            Ditolak</option>
                                                        <option value="diproses"
                                                            @if ($balasan['status'] == 'diproses') selected @endif>
                                                            Diproses</option>
                                                        <option value="selesai"
                                                            @if ($balasan['status'] == 'selesai') selected @endif>
                                                            Selesai</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" value="submit"
                                                    class="btn btn-success">Kirim</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
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
                                <p class="mt-0 mb-0 text-xs">
                                    @if ($balasan != null)
                                        {{ $balasan['balasan'] }}
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>
                        </div>
                        <hr class="mt-0 mb-2 mx-3">
                        <div class="row mx-3 mb-2">
                            <div class="col">
                                <p class="mt-0 mb-0 text-sm fw-bolder">Status</p>
                            </div>
                            <div class="col">
                                @if ($balasan != null)
                                    @if ($balasan['status'] == 'diajukan')
                                        <span class="badge badge-sm bg-gradient-warning">Diajukan</span>
                                    @elseif($balasan['status'] == 'diterima')
                                        <span class="badge badge-sm bg-gradient-info">Diterima</span>
                                    @elseif($balasan['status'] == 'ditolak')
                                        <span class="badge badge-sm bg-gradient-danger">Ditolak</span>
                                    @elseif($balasan['status'] == 'diproses')
                                        <span class="badge badge-sm bg-gradient-info">Diproses</span>
                                    @elseif($balasan['status'] == 'selesai')
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
