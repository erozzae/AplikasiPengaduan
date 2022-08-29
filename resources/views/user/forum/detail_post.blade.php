@extends('master')

@section('hlm_jdl')
    Detail
@endsection
@section('head')
    <style>
        .btn-act {
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
    <div class="row mb-2 mt-3">
        <div class="col-lg-11 mb-md-0 mb-4">
            <div class="col-lg-6 col-7">
                <h6>Postingan dan Komentar</h6>
            </div>
            <div class="card px-0 py-3 mb-1">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <tbody>
                            <tr>
                              
                                <div class="d-flex px-3 py-2" style="float: right">
                                    @if ($post['id_user'] == session()->get('user')['id'])
                                        <form action="{{ route('user.post.edit', $post['id_postingan']) }}"
                                            method="GET">
                                            @csrf
                                            <button type="submit" class="btn-act material-icons">edit</button>
                                        </form>
                                    @endif
                                    @if ($post['id_user'] == session()->get('user')['id'])
                                        <form action="{{ route('user.post.dtl.delete', $post['id_postingan']) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn-act material-icons">delete</button>
                                        </form>
                                    @endif
                                </div>
                                <div class="d-flex px-4 py-1">
                                    <p class="text-xs fw-lighter text-center me-2">
                                        {{ \Carbon\Carbon::parse($post['updated_at'])->diffForHumans() }}</p>
                                </div>
                                <div class="d-flex flex-column justify-content-center mt-0 mb-2 px-4 p-0 text-sm">
                                    <p class="mt-0 mb-0 fw-normal text-sm">{!! $post['isi_postingan'] !!}</p>
                                </div>
                            </tr>
                            <tr>
                                <div class="comment d-flex px-3 py-0 mt-0 mb-0">
                                    <div class="d-flex px-3 py-0">
                                        <div>
                                            @if (session()->get('user')['xgbr'] == null)
                                                <img src="{{ asset('assets/img/user.png') }}" class="avatar avatar-sm me-3"
                                                    alt="img" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Amnan">
                                            @else
                                                <img src="{{ 'http://127.0.0.1:8000/images/' . session()->get('user')['xgbr'] }}"
                                                    class="avatar avatar-sm me-3" alt="img" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="{{ session()->get('user')['name'] }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="input-group mb-0">
                                        <form
                                            action="{{ route('user.komen.store', [session()->get('user')['id'], $post['id_postingan']]) }}"
                                            method="POST">
                                            @csrf
                                            <textarea type="textarea" name="isi_komentar" class="form-control pb-0" placeholder="Tuliskan Komentar"
                                                style="resize: none"></textarea>
                                            <button class="btn btn-success" type="submit">Kirim</button>
                                        </form>
                                    </div>
                                </div>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mx-2 mt-2">
                @include('alert.alert-dismissible')
            </div>
            @if ($post['komentar'] != null)
                @foreach ($post['komentar'] as $k)
                    <div class="card px-0 py-1 mb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <tbody>
                                    <div class="d-flex px-3 py-2" style="float: right">
                                        <p class="text-xs text-center me-2">
                                            {{ \Carbon\Carbon::parse($k['updated_at'])->diffForHumans() }}</p>
                                        @if ($k['id_user'] == session()->get('user')['id'])
                                            <form action="{{ route('user.komen.delete', $k['id_komentar']) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn-act material-icons pb-4">delete</button>
                                            </form>
                                        @endif
                                    </div>
                                    <tr>
                                        <div class="col justify-content-center mb-3 px-3 py-1">
                                            <p class="mt-0 mb-0 text-sm">{{ $k['isi_komentar'] }}</p>
                                        </div>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            @endif
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
