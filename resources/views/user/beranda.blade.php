@extends('master')

@section('hlm_jdl')
    Beranda
@endsection

@section('konten')
    <div class="container mt-2">
        <div class="row mb-4">
            <div class="col-lg-11 mb-md-0 mb-4">
                <div class="ms-0 mt-2">
                    @include('alert.alert-dismissible')
                </div>
                @if (session()->get('user')['level'] == 'user')
                    <div class="col-lg-11 mb-md-0 mb-4">
                        <hr class="mt-0">
                    </div>
                    <div class="row mb-2">
                        <div class="bg-gradient-secondary">
                            <h3 class="fw-lighter px-4 pt-3 mb-1" style="color: #dee2e6;">Hallo
                                {{ session()->get('user')['name'] }} </h3>
                            <p class="fw-lighter px-4" style="color: #dee2e6; font-size:12px;">Selamat datang di website
                                Pengaduan</p>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6 col-7">
                        <h3>Pengaduan</h3>
                    </div>
                    <div class="col-lg-11 mb-md-0 mb-4">
                        <hr class="mt-0">
                    </div>
                    <div class="card px-0 py-1 mb-2 py-2 bg-secondary">
                        <div class="bg-gradient-secondary">
                            <h3 class="fw-lighter px-4 pt-3 mb-1" style="color: #dee2e6;">Pengaduan dapat dilakukan disini
                            </h3>
                            <p class="fw-lighter px-4" style="color: #dee2e6; font-size:12px;">Jika terdapat permasalahan
                                dengan
                                layanan kami atau ingin melakukan komplain dapat menambahkan pengaduan disini.</p>
                            <br>
                            <p class="fw-lighter px-4 mb-1" style="color: #dee2e6; font-size:12px;">Klik tombol dibawah
                                untuk
                                menambahkan pengaduan.</p>
                            {{-- <button type="button" class="btn btn-info ms-4" data-bs-toggle="modal"
                                data-bs-target="#komplainModal">Tambah Pengaduan</button> --}}
                            <form action="{{ route('user.komplain.create') }}" method="GET">
                                <button type="submit" class="btn btn-info ms-4">Tambah Pengaduan</button>
                            </form>                       
                        </div>
                        {{-- <div class="modal fade" id="komplainModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pertanyaan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('user.komplain.store', session('user')['id']) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group bmd-form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="material-icons">info</i>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="judul_komplain_saran" class="form-control"
                                                        placeholder="Judul pengaduan" style="max-width: 90%">
                                                </div>
                                            </div>
                                            <hr class="mt-0">
                                            <div class="form-group bmd-form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i
                                                                class="material-icons">notification_important</i></div>
                                                    </div>
                                                    <input type="text" name="isi_komplain_saran" class="form-control"
                                                        placeholder="Isi Pengaduan" style="max-width: 90%">
                                                </div>
                                            </div>
                                            <hr class="mt-0 ">
                                            <div class="form-group bmd-form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="material-icons">mail</i>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="email" class="form-control"
                                                        placeholder="Email Yang Dapat Dihubungi" style="max-width: 90%">
                                                </div>
                                            </div>
                                            <hr class="mt-0 ">

                                            <div class="form-group bmd-form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="material-icons">image</i>
                                                        </div>
                                                    </div>
                                                    <input type="file" name="gambar">
                                                </div>
                                            </div>

                                            <hr class="mt-3">
                                            <div class="input-group input-group-static mb-4">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="material-icons">label</i></div>
                                                </div>
                                                <label class="ms-0"
                                                    style="color: #adb5bd;
                                                opacity: 1;">Jenis
                                                    Pengaduan</label>
                                                <select class="form-control" name="jenis">
                                                    <option value="Pengaduan Aplikasi">Pengaduan Aplikasi</option>
                                                    <option value="Konsultasi">Konsultasi</option>
                                                    <option value="Layanan">Layanan</option>
                                                </select>
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
                        </div> --}}
                    </div>
                @endif
            </div>
        </div>
        @if (session()->get('user')['level'] == 'admin')
            <div class="col-lg-11 mb-md-0 mb-4">
                <hr class="mt-0">
            </div>
            <div class="row mb-2">
                <div class="bg-gradient-secondary">
                    <h3 class="fw-lighter px-4 pt-3 mb-1" style="color: #dee2e6;">Hallo
                        {{ session()->get('user')['name'] }}, Anda adalah Admin </h3>
                    <p class="fw-lighter px-4" style="color: #dee2e6; font-size:12px;">Admin dapat mengelola aktivitas
                        user
                        dan akun user</p>
                    <br>
                </div>
            </div>
        @endif
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
