@extends('master')

@section('hlm_jdl')
    Q&A
@endsection
@section('head')
    <style>
        .btn-del {
            background-color: transparent;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
            overflow: hidden;
            outline: none;
        }
    </style>
@endsection
@section('konten')
    <div class="row mb-2">
        <div class="col-lg-11 mb-md-0 mb-4">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col">
                        <h6 class="mt-3">Pertanyaan dan Jawaban</h6>
                    </div>
                    @if (session()->get('user')['level']=='user')
                    <div class="col">
                        <button type="button" class="btn btn-info p-2 mt-4" data-bs-toggle="modal"
                            data-bs-target="#pertanyaanModal" style="float: right">Tambah Pertanyaan</button>
                    </div>
                    @endif          
                    <div class="mx-2">
                        @include('alert.alert-dismissible')
                    </div>
                    <div class="modal fade" id="pertanyaanModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Pertanyaan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('user.tanya.store', session()->get('user')['id']) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="input-group">
                                            <textarea class="form-control" aria-label="With textarea" placeholder="Tambah Pertanyaan" name="isi_pertanyaan"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-success">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($result as $q)
                <div class="card px-0 pb-2 py-1 mb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <tbody>
                                <tr>
                                    @if (session()->get('user')['level'] == 'admin')
                                    <div class="d-flex px-3 py-2" style="float: right">
                                        <form action="{{ route('admin.tanya.delete', $q['id_pertanyaan']) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="material-icons p-0 btn-del">delete</button>
                                        </form>
                                    </div>
                                    @endif                           
                                    <div class="d-flex px-3 py-2" style="float: right">
                                       <p class="text-xs "> {{ \Carbon\Carbon::parse($q['tanya_at'])->diffForHumans() }}</p>
                                    </div>
                                    <div class="d-flex px-3 py-1">
                                        @if ($q['gambar'] == null)
                                        <div>
                                            <img src="{{ asset('assets/img/user.png') }}" class="avatar avatar-sm me-3"
                                                alt="xd" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="{{ $q['user_tanya'] }}">
                                        </div>
                                        @else 
                                        <div>
                                            <img src="{{ 'http://127.0.0.1:8000/images/'.$q['gambar'] }}" class="avatar avatar-sm me-3"
                                                alt="xd" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="{{ $q['user_tanya'] }}">
                                        </div>  
                                        @endif                              
                                        <div class="d-flex flex-column justify-content-center">
                                            <p class="mt-0 mb-0 text-md fw-bolder">{{ $q['user_tanya'] }}</p>
                                            <p class="mt-0 mb-0 text-sm">{{ $q['isi_pertanyaan'] }}</p>
                                        </div>
                                    </div>
                                </tr>
                                <tr>
                                    @if ($q['isi_jawaban'] != null)
                                        <div class="d-flex px-3 py-2" style="float: right">
                                            @if (session()->get('user')['level'] == 'admin')
                                            <form action="{{ route('admin.jawab.delete', $q['id_jawaban']) }}"
                                                method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="material-icons p-0 btn-del" value="delete">delete</button>
                                            </form>
                                            @endif
                                        </div>
                                        <div class="d-flex px-3 py-2" style="float: right">
                                            <p class="text-xs "> {{ \Carbon\Carbon::parse($q['jawab_at'])->diffForHumans() }}</p>
                                         </div>
                                        <div class="d-flex px-2 py-1 ms-6">
                                            <div>
                                                <img src="{{ asset('assets/img/integra.jpg') }}" class="avatar avatar-xs me-3"
                                                    alt="img" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="PT Integra Inovasi">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="mt-0 mb-0 text-sm fw-bolder">PT Integra Inovasi</p>
                                                <p class="mb-0 text-sm">{{ $q['isi_jawaban'] }}</p>
                                            </div>
                                            <div>
                                                <img src="{{ asset('assets/img/checklist.png') }}" class="avatar avatar-xs ms-1 mb-2"
                                                    alt="img" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($q['isi_jawaban'] == null && session()->get('user')['level'] == 'admin')
                                        <div class="comment d-flex ps-2 pe-3 pt-2" style="width: 100%">
                                            <div class="d-flex px-2 py-0">
                                                <div>
                                                    <img src="{{ asset('assets/img/integra.jpg') }}"
                                                        class="avatar avatar-sm me-3" alt="xd"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="PT Integra Inovasi">
                                                </div>
                                            </div>                                      
                                            <div class="input-group mb-0">                                
                                                <form
                                                    action="{{ route('admin.tanya.jawab', [$q['id_pertanyaan'], session()->get('user')['id']]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <textarea type="textarea" name="isi_jawaban" class="form-control pb-0" placeholder="Tuliskan Balasan"
                                                        style="resize: none;"></textarea>
                                                    <button class="btn btn-success" type="submit">Kirim</button>
                                                </form>                                            
                                            </div>                                 
                                        </div>
                                    @endif

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach

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
