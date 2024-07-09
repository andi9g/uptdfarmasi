@extends('layouts.admin')

@section('judul', 'Data Tanaman Herbal')

@section('warnatanamanherbal', 'active')

@section('content')
<div id="tambahtanamanherbal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tambah-tanaman-herbal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah-tanaman-herbal">Form Tambah Data</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tanamanherbal.store', []) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namatanamanherbal">Nama Tanaman Herbal</label>
                        <input id="namatanamanherbal" class="form-control rounded-0" type="text" name="namatanamanherbal" placeholder="Nama tanaman herbal">
                        <input id="namalain" class="form-control rounded-0" type="text" name="namalain" placeholder="Nama lain, Contoh : Aloe Vera">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Singkat</label>
                        <textarea id="deskripsi" class="form-control" name="deskripsi" rows="2" placeholder="Contoh : Tanaman lidah buaya. Inset: Bunga lidah buaya"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar <small class="text-danger">jpg/png</small></label>
                        <input id="gambar" required class="form-control" type="file" name="gambar">
                    </div>

                    <hr>
                    <h5 class="card-title">Detail Tanaman Herbal <small>( - ) Jika tidak ada</small></h5><br>

                    <div class="form-group">
                        <label for="klasifikasi">klasifikasi</label>
                        <input required id="klasifikasi" required class="form-control" type="text" name="klasifikasi" placeholder="contoh : TAKSONOMI">
                    </div>
                    <div class="form-group">
                        <label for="superkerajaan">Superkerajaan</label>
                        <input required id="superkerajaan" class="form-control" type="text" name="superkerajaan">
                    </div>
                    <div class="form-group">
                        <label for="kerajaan" class="text-capitalize">Kerajaan</label>
                        <input required id="kerajaan" class="form-control" type="text" name="kerajaan">
                    </div>
                    <div class="form-group">
                        <label for="divisi" class="text-capitalize">divisi</label>
                        <input required id="divisi" class="form-control" type="text" name="divisi">
                    </div>
                    <div class="form-group">
                        <label for="ordo" class="text-capitalize">ordo</label>
                        <input required id="ordo" class="form-control" type="text" name="ordo">
                    </div>
                    <div class="form-group">
                        <label for="famili" class="text-capitalize">famili</label>
                        <input required id="famili" class="form-control" type="text" name="famili">
                    </div>
                    <div class="form-group">
                        <label for="genus" class="text-capitalize">genus</label>
                        <input required id="genus" class="form-control" type="text" name="genus">
                    </div>
                    <div class="form-group">
                        <label for="spesies" class="text-capitalize">spesies</label>
                        <input required id="spesies" class="form-control" type="text" name="spesies">
                    </div>
                    <div class="form-group">
                        <label for="khasiat" class="text-capitalize">Manfaat</label>
                        <input required id="khasiat" class="form-control" type="text" name="khasiat">
                    </div>
                    <div class="form-group">
                        <label for="namadaerah" class="text-capitalize">nama daerah</label>
                        <input  id="namadaerah" class="form-control" type="text" name="namadaerah">
                    </div>
                    <div class="form-group">
                        <label for="bagianyangdigunakan" class="text-capitalize">Bagian yang digunakan</label>
                        <input  id="bagianyangdigunakan" class="form-control" type="text" name="bagianyangdigunakan">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#tambahtanamanherbal">Tambah Tanaman Herbal</button>

                    <form action="{{ route('cetak.tanamanherbal', []) }}" method="get" class="d-inline">
                        <input type="text" value="{{ $keyword }}" name="keyword" hidden>
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa fa-print"></i> Cetak
                        </button>
                    </form>
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
                            <th>Nama Tanaman Herbal</th>
                            <th>Nama Alias</th>
                            <th>Detail</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($tanamanherbal as $item)
                            <tr>
                                <td>{{ $loop->iteration + $tanamanherbal->firstItem() - 1 }}</td>
                                <td>{{ $item->namatanamanherbal }}</td>
                                <td>{{ $item->namalain }}</td>
                                <td>
                                    <button class="badge badge-info badge-btn border-0" type="button" data-toggle="modal" data-target="#show{{ $item->idtanamanherbal }}">
                                        <i class="fa fa-eye"></i> Lihat Detil
                                    </button>
                                </td>
                                <td nowrap>
                                    <form action='{{ route('tanamanherbal.destroy', [$item->idtanamanherbal]) }}' method='post' class='d-inline'>
                                         @csrf
                                         @method('DELETE')
                                         <button type='submit' onclick="return confirm('Hapus data ini?')" class='badge badge-danger badge-btn border-0'>
                                             <i class="fa fa-trash"></i>
                                         </button>
                                    </form>

                                    <button class="badge badge-primary badge-btn border-0" type="button" data-toggle="modal" data-target="#edittanamanherbal{{ $item->idtanamanherbal }}"><i class="fa fa-edit"></i></button>
                                </td>

                            </tr>

                            <div id="show{{ $item->idtanamanherbal }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="my-modal-title">Detail Tanaman Herbal</h5>
                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <h4 class="m-0 p-0">{{ $item->namatanamanherbal }}</h4>
                                            <h5 class="m-0 p-0">{{ $item->namalain }}</h5>
                                            <img src="{{ url('gambar/tanamanherbal', [$item->gambar]) }}" style="max-height: 200px" alt="">
                                            <p class="m-0 p-0">{{ $item->deskripsi }}</p>
                                            <hr>

                                            <div class="form-group">
                                                <label for="klasifikasi">klasifikasi</label>
                                                <input required id="klasifikasi" readonly class="form-control text-center" type="text" name="klasifikasi" value="{{ $item->klasifikasi }}" placeholder="contoh : TAKSONOMI">
                                            </div>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-capitalize bg-light" id="superkerajaan">superkerajaan</span>
                                                </div>
                                                <input class="form-control" type="text" name="" readonly placeholder="Recipient's text" aria-label="Recipient's text" aria-describedby="superkerajaan" value="{{ $item->superkerajaan }}">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-capitalize bg-light" id="kerajaan">kerajaan</span>
                                                </div>
                                                <input class="form-control" type="text" name="" readonly placeholder="Recipient's text" aria-label="Recipient's text" aria-describedby="kerajaan" value="{{ $item->kerajaan }}">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-capitalize bg-light" id="divisi">divisi</span>
                                                </div>
                                                <input class="form-control" type="text" name="" readonly placeholder="Recipient's text" aria-label="Recipient's text" aria-describedby="divisi" value="{{ $item->divisi }}">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-capitalize bg-light" id="ordo">ordo</span>
                                                </div>
                                                <input class="form-control" type="text" name="" readonly placeholder="Recipient's text" aria-label="Recipient's text" aria-describedby="ordo" value="{{ $item->ordo }}">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-capitalize bg-light" id="famili">famili</span>
                                                </div>
                                                <input class="form-control" type="text" name="" readonly placeholder="Recipient's text" aria-label="Recipient's text" aria-describedby="famili" value="{{ $item->famili }}">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-capitalize bg-light" id="genus">genus</span>
                                                </div>
                                                <input class="form-control" type="text" name="" readonly placeholder="Recipient's text" aria-label="Recipient's text" aria-describedby="genus" value="{{ $item->genus }}">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-capitalize bg-light" id="khasiat">khasiat</span>
                                                </div>
                                                <input class="form-control" type="text" name="" readonly placeholder="Recipient's text" aria-label="Recipient's text" aria-describedby="khasiat" value="{{ $item->khasiat }}">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-capitalize bg-light" id="spesies">spesies</span>
                                                </div>
                                                <input class="form-control" type="text" name="" readonly placeholder="Recipient's text" aria-label="Recipient's text" aria-describedby="spesies" value="{{ $item->spesies }}">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-capitalize bg-light" id="asal">bagianyangdigunakan</span>
                                                </div>
                                                <input class="form-control" type="text" name="" readonly placeholder="Recipient's text" aria-label="Recipient's text" aria-describedby="bagianyangdigunakan" value="{{ $item->bagianyangdigunakan }}">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-capitalize bg-light" id="namadaerah">nama daerah</span>
                                                </div>
                                                <input class="form-control" type="text" name="" readonly placeholder="Recipient's text" aria-label="Recipient's text" aria-describedby="namadaerah" value="{{ $item->namadaerah }}">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="edittanamanherbal{{ $item->idtanamanherbal }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="my-modal-title">Title</h5>
                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('tanamanherbal.update', [$item->idtanamanherbal]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method("PUT")
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="namatanamanherbal">Nama Tanaman Herbal</label>
                                                    <input id="namatanamanherbal" class="form-control rounded-0" type="text" name="namatanamanherbal" placeholder="Nama tanaman herbal" value="{{ $item->namatanamanherbal }}">
                                                    <input id="namalain" class="form-control rounded-0" type="text" name="namalain" placeholder="Nama lain, Contoh : Aloe Vera" value="{{ $item->namalain }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="deskripsi">Deskripsi Singkat</label>
                                                    <textarea id="deskripsi" class="form-control" name="deskripsi" rows="2" placeholder="Contoh : Tanaman lidah buaya. Inset: Bunga lidah buaya">{{ $item->deskripsi }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="gambar">Gambar <small class="text-danger">jpg/png</small></label>
                                                    <input id="gambar" class="form-control" type="file" name="gambar">
                                                </div>

                                                <hr>
                                                <h5 class="card-title">Detail Tanaman Herbal <small>( - ) Jika tidak ada</small></h5><br>

                                                <div class="form-group">
                                                    <label for="klasifikasi">Klasifikasi</label>
                                                    <input required id="klasifikasi" style="background: rgb(183, 255, 183)" required class="form-control" type="text" name="klasifikasi" value="{{ $item->klasifikasi }}" placeholder="contoh : TAKSONOMI">
                                                </div>

                                                <div class="form-group">
                                                    <label for="superkerajaan">Superkerajaan</label>
                                                    <input required id="superkerajaan" class="form-control" type="text" value="{{ $item->superkerajaan }}" name="superkerajaan">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kerajaan" class="text-capitalize">Kerajaan</label>
                                                    <input required id="kerajaan" class="form-control" type="text" value="{{ $item->kerajaan }}" name="kerajaan">
                                                </div>
                                                <div class="form-group">
                                                    <label for="divisi" class="text-capitalize">divisi</label>
                                                    <input required id="divisi" class="form-control" type="text" value="{{ $item->divisi }}" name="divisi">
                                                </div>
                                                <div class="form-group">
                                                    <label for="ordo" class="text-capitalize">ordo</label>
                                                    <input required id="ordo" class="form-control" type="text" value="{{ $item->ordo }}" name="ordo">
                                                </div>
                                                <div class="form-group">
                                                    <label for="famili" class="text-capitalize">famili</label>
                                                    <input required id="famili" class="form-control" type="text" value="{{ $item->famili }}" name="famili">
                                                </div>
                                                <div class="form-group">
                                                    <label for="genus" class="text-capitalize">genus</label>
                                                    <input required id="genus" class="form-control" type="text" value="{{ $item->genus }}" name="genus">
                                                </div>
                                                <div class="form-group">
                                                    <label for="spesies" class="text-capitalize">spesies</label>
                                                    <input required id="spesies" class="form-control" type="text" value="{{ $item->spesies }}" name="spesies">
                                                </div>
                                                <div class="form-group">
                                                    <label for="khasiat" class="text-capitalize">khasiat</label>
                                                    <input required id="khasiat" class="form-control" type="text" value="{{ $item->khasiat }}" name="khasiat">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bagianyangdigunakan" class="text-capitalize">bagianyangdigunakan</label>
                                                    <input id="bagianyangdigunakan" class="form-control" type="text" value="{{ $item->bagianyangdigunakan }}" name="bagianyangdigunakan">
                                                </div>
                                                <div class="form-group">
                                                    <label for="namadaerah" class="text-capitalize">nama daerah</label>
                                                    <input id="namadaerah" class="form-control" type="text" value="{{ $item->namadaerah }}" name="namadaerah">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Update Sekarang</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="card-footer">
            {{ $tanamanherbal->links("vendor.pagination.bootstrap-4") }}
        </div>

    </div>

</div>
@endsection
