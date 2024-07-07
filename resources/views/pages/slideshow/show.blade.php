@extends('layouts.admin')

@section('warnaslideshow', 'active')

@section('judul', 'Data Slideshow')

@section('content')

<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <a href="{{ route('slideshow.create', []) }}" class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="col-md-4">
                    <form action="{{ url()->current() }}">
                        <div class="input-group">
                            <input class="form-control" type="text" name="keyword" value="{{ $keyword }}" placeholder="masukan judul" aria-label="masukan judul" aria-describedby="keyword">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text bg-secondary" id="keyword">
                                    <i class="fa fa-search"></i> Cari
                                </button>
                            </div>
                        </div>
=
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="5px">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>

                        <tbody>
                            @foreach ($slideshow as $item)
                                <tr>
                                    <td>{{ $loop->iteration + $slideshow->firstItem() - 1 }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>
                                        <button class="badge badge-info badge-btn border-0" type="button" data-toggle="modal" data-target="#show{{ $item->idslideshow }}">
                                            <i class="fa fa-eye"></i> Detail
                                        </button>
                                    </td>
                                    <td nowrap>
                                        <form action='{{ route('slideshow.destroy', [$item->idslideshow]) }}' method='post' class='d-inline'>
                                             @csrf
                                             @method('DELETE')
                                             <button type='submit' onclick="return confirm('Yakin ingin dihapus?')" class='badge badge-danger badge-btn border-0'>
                                                 <i class="fa fa-trash"></i> Hapus
                                             </button>
                                        </form>

                                        <a href="{{ route('slideshow.edit', [$item->idslideshow]) }}" class="badge badge-primary badge-btn border-0">
                                            <i class="fa fa-edit"></i>
                                            Ubah
                                        </a>
                                    </td>
                                </tr>


                                <div id="show{{ $item->idslideshow }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="my-modal-title">Show Detail Deskripsi</h5>
                                                <button class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                    echo strip_tags(htmlspecialchars_decode($item->deskripsi),'<p><img><ul><li><ol><strong><i><u><center><b><h1><h2><h3><h4><h5><a><table><tr><td><th><div>');
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
