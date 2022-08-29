@extends('master')

@section('hlm_jdl')
    Edit Postingan
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
                <h6>Edit Postingan</h6>
            </div>
            <div class="mx-2 mt-1">
                @include('alert.alert-dismissible')
            </div>
            <div class="card px-0 pt-4 pb-2 mb-1">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <tbody>
                           
                                <div class="d-flex flex-column justify-content-center mt-0 mb-0 px-4 p-0 text-sm">
                                    <form action="{{ route('user.post.update',$post['id_postingan']) }}" method="POST">
                                        @csrf
                                        <div class="container mx-0 px-0" style="width:450px;max-width: 450px">
                                            <div>
                                                <textarea id="editor" class="form-control" aria-label="With textarea" name="isi_postingan">{{ $post['isi_postingan'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-6 text-right">
                                                <button type="submit" class="btn btn-success ">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            
                        </tbody>
                    </table>
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
