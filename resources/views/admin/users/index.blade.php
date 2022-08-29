@extends('master')

@section('hlm_jdl')
    Semua User
@endsection

@section('konten')
    <div class="container-fluid py-4 ps-0">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Tabel User</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <div class="mx-4">
                                            @include('alert.alert-dismissible')       
                                        </div>                                                                                                  
                                    </tr>
                                    <tr>
                                        <th class="py-0">
                                            <form action="{{ route('admin.user.create') }}" method="GET">
                                                <button type="submit" class="btn btn bg-gradient-info p-1">Tambah
                                                    User</button>
                                            </form>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                            dan Email</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Level</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            colspan="2">Aksi</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Update Terakhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $r)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-4 py-1">
                                                    <div>
                                                        @if ( $r['gambar'] == null)
                                                        <img src="{{ asset('assets/img/user.png') }}"
                                                        class="avatar avatar-sm me-3 border-radius-lg" alt="img">
                                                        @else
                                                        <img src="{{ 'http://127.0.0.1:8000/images/'.$r['gambar'] }}"
                                                        class="avatar avatar-sm me-3 border-radius-lg" alt="img">                                    
                                                        @endif                                                           
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $r['name'] }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $r['email'] }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $r['level'] }}</p>
                                                @if ($r['posisi'] != null)
                                                    <p class="text-xs text-secondary mb-0">{{ $r['posisi'] }}</p>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center text-sm">                     
                                                <form action="{{ route('admin.user.edit', $r['id']) }}" method="GET">
                                                    <button class="btn btn bg-gradient-info mt-3 px-2 py-1">Edit</button>
                                                </form>  
                                              
                                            </td>
                                                                           
                                            <td class="align-middle text-center text-sm">
                                                <form action="{{ route('admin.user.delete',$r['id']) }}" method="POST">'
                                                    @csrf
                                                    <button
                                                        class="btn btn bg-gradient-danger mt-3 px-2 py-1">Hapus</button>
                                                </form>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ Carbon\Carbon::parse($r['updated_at'])->format('d-m-Y') }}</span>
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

