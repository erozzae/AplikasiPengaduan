@extends('master')

@section('hlm_jdl')
    Forum
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
                <h6>Postingan</h6>
            </div>
            <div class="card px-0 pb-2 py-1 mb-2">
                <table class="table align-items-center mb-0">
                    <table class="table align-items-center mb-0">
                        <tbody>
                            <tr>
                                <div class="d-flex px-2 py-1 ms-4">
                                    <div class="pt-1">
                                        @if (session()->get('user')['xgbr'] == null)
                                            <img src="{{ asset('assets/img/user.png') }}" class="avatar avatar-lg me-3"
                                                alt="img" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="{{ session()->get('user')['name'] }}">
                                        @else
                                            <img src="{{ 'http://127.0.0.1:8000/images/' . session()->get('user')['xgbr'] }}"
                                                class="avatar avatar-lg me-3" alt="img" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="{{ session()->get('user')['name'] }}">
                                        @endif
                                    </div>
                                    <div class="d-flex border rounded-pill px-3 post-box">
                                        <a class="pt-3 px-2" style="cursor:pointer;max-width:100%;color:#6c757d;"
                                            data-bs-toggle="modal" data-bs-target="#postinganModal">Mulai Forum</a>
                                    </div>
                                    <div class="modal fade" id="postinganModal" tabindex="-1" aria-hidden="true">
                                        <form action="{{ route('user.post.store', session()->get('user')['id']) }}"
                                            method="POST">
                                            @csrf
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Postingan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="input-group">
                                                            <div class="container" style="width:450px;max-width: 450px">
                                                                <div>
                                                                    <textarea id="editor" class="form-control" aria-label="With textarea" name="isi_postingan"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-success">Kirim</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </tr>
                        </tbody>
                    </table>
                </table>
            </div>
            <div class="mx-2">
                @include('alert.alert-dismissible')
            </div>
            @foreach ($result as $r)
                <div class="card px-0 py-1 mb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <tbody>
                                <tr>
                                    <div class="d-flex px-3 py-2" style="float: right">
                                        @if ($r['id_user'] == session()->get('user')['id'])
                                            <form action="{{ route('user.post.edit', $r['id_postingan']) }}"
                                                method="GET">
                                                @csrf
                                                <button type="submit" class="btn-act material-icons">edit</button>
                                            </form>
                                        @endif
                                        @if ($r['id_user'] == session()->get('user')['id'] || session()->get('user')['level'] == 'admin')
                                            <form action="{{ route('user.post.delete', $r['id_postingan']) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn-act material-icons">delete</button>
                                            </form>
                                        @endif
                                    </div>
                                    <div class="d-flex px-4 pt-2">
                                        <p class="text-xs fw-lighter text-center me-2">
                                            {{ \Carbon\Carbon::parse($r['updated_at'])->diffForHumans() }}</p>
                                    </div>
                                    <div class="d-flex px-3 py-1">
                                        <div style="display: inline-block">
                                            @if ($r['user']['gambar'] == null)
                                                <img src="{{ asset('assets/img/user.png') }}" class="avatar avatar-sm me-3"
                                                    alt="img" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="{{ $r['user']['name'] }}">
                                            @else
                                                <img src="{{ 'http://127.0.0.1:8000/images/' . $r['user']['gambar'] }}"
                                                    class="avatar avatar-sm me-3" alt="img" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="{{ $r['user']['name'] }}">
                                            @endif
                                        </div>
                                        <p class="mt-0 mb-0 text-md fw-bolder">{{ $r['user']['name'] }}</p>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center mt-1 mb-0 px-4 text-sm">
                                        <p class="mt-0 mb-0 fw-normal text-sm">{!! $r['isi_postingan'] !!}</p>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="d-flex mt-1 ps-4 pt-1 pb-1">
                                        <a href="{{ route('user.forum', $r['id_postingan']) }}"><span
                                                class="material-icons">comment</span></a>
                                    </div>
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

@section('ckEditor')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote', 'link'],

            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
