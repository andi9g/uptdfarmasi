@extends('layouts.admin')

@section('warnaslideshow', 'active')

@section('judul', 'Data Slideshow')

@section('content')

<div class="container-fluid">
<a href="{{ url('slideshow', []) }}" class="btn btn-danger">Kembali</a>


<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h3 class="">Form Tambah Data</h3>
                <p class="card-text">Slide Show</p>
            </div>
            <form action="{{ route('slideshow.store', []) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul">JUDUL</label>
                        <input id="judul" class="form-control" type="text" placeholder="masukan judul" name="judul">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">DESKRIPSI</label>
                        <textarea id="summernote" placeholder="masukan deskripsi" name="deskripsi" ></textarea>
                    </div>

                    <div class="form-group">
                        <label for="gambar">GAMBAR</label>
                        <input id="gambar" class="form-control" type="file" placeholder="masukan gambar" name="gambar">
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">TAMBAH DATA</button>
                </div>

            </form>
        </div>
    </div>
</div>

</div>

@endsection


@section('myScript')
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>
@endsection
