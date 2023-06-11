@extends('pages.main')
@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-4 shadow-lg">
                <div class="card p-1 m-1 bg-primary shadow-lg">
                        <h4 class="text-white text-center">
                            DATA GURU
                            </h3>
                    </div>
                    <div class='col-12 m-3'>
                    <button type="button" class="btn btn-info btn-lg text-xs mb-0 px-3" data-bs-toggle="modal" data-bs-target="#addmodal">
                        ADD GURU
                    </button>
                    </div>
                        <table class="order-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th style="text-align: center">No.</th>
                                    <th style="text-align: center">NIP</th>
                                    <th style="text-align: center">Nama</th>
                                    <th style="text-align: center">Nomor Telepon</th>
                                    <th style="text-align: center">Agama</th>
                                    <th style="text-align: center">Alamat</th>
                                    <th style="text-align: center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                            $nomer = 1;
                            @endphp
                            @foreach ($dataguru as $ds)
                                <tr>
                                    <td style="text-align: center">{{$nomer++}}</td>
                                    <td style="text-align: center">{{$ds->nip}}</td>
                                    <td style="text-align: center">{{$ds->nama}}</td>
                                    <td style="text-align: center">{{$ds->notelp}}</td>
                                    <td style="text-align: center">{{$ds->agama}}</td>
                                    <td style="text-align: center">{{ $ds->alamat }}</td>
                                    <td class="align-middle text-center text-sm">
                                        <button type="button" class="btn btn-info btn-sm text-xs mb-0 px-3" data-bs-toggle="modal" data-bs-target="#editmodal-{{$ds->id}}">
                                            <i class="fas fa-list-ul"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm text-xs mb-0 px-3"
                                                data-bs-toggle="modal" data-bs-target="#hapusmodal-{{$ds->id}}">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
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

@foreach ($dataguru as $data)
<!-- MODAL Hapus Guru -->
<div class="modal fade" id="hapusmodal-{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Batal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{url('hapusguru/'.$data->id)}}" method="POST">
                    {{ csrf_field() }}
                <div class="row">
                    <p>Yakin Ingin Menghapus Kelas {{$data->namakelas}}.
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Iya</button>
            </div>
            </form>

        </div>
    </div>
</div>
@endforeach

<!-- MODAL EDIT -->
@foreach ($dataguru as $data1)
<div class="modal fade" id="editmodal-{{$data1->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Details Dan Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{url('updatedataguru/'.$data1->id)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">ID</label>
                            <input class="form-control" name="id" id="id" readonly value="{{$data1->id}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">NIP</label>
                            <input class="form-control" name="nip" id="nip" type="text" value="{{$data1->nip}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nama</label>
                            <input class="form-control" name="nama" id="nama" type="text" value="{{$data1->nama}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Password</label>
                            <input class="form-control" name="password" id="password" type="text" value="{{$data1->password}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Jenis Kelamin</label>
                            <input class="form-control" name="jk" id="jk" type="text" value="{{$data1->jk}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Agama</label>
                            <input class="form-control" name="agama" id="agama" type="text" value="{{$data1->agama}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">NO Telp</label>
                            <input class="form-control" name="notelp" id="notelp" type="text" value="{{$data1->notelp}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Tempat Lahir</label>
                            <input class="form-control" name="tempatlahir" id="tempatlahir" type="text" value="{{$data1->tempatlahir}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                            <input class="form-control" name="tgllahir" id="tgllahir" type="date" value="{{$data1->tgllahir}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Alamat</label>
                            <input class="form-control" name="alamat" id="alamat" type="text" value="{{$data1->alamat}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto" class="form-label">Upload Image</label>
                            <input type="file" class="" name="foto" id="foto">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Foto</label><br>
                            <img src="images/staff/{{$data1->foto}}" width="200" height="300">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- MODAL ADD -->

<div class="modal fade" id="addmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">ADD Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{url('tambahguru')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">NIP</label>
                            <input class="form-control" name="nip" id="nip" placeholder="NIP" type="text" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nama</label>
                            <input class="form-control" name="nama" id="nama" placeholder="Nama" type="text" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Password</label>
                            <input class="form-control" name="password" id="password" placeholder="Password" type="text" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Jenis Kelamin</label>
                            <input class="form-control" name="jk" id="jk" type="text" placeholder="L / P" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Agama</label>
                            <input class="form-control" name="agama" id="agama" placeholder="Agama" type="text" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">NO Telp</label>
                            <input class="form-control" name="notelp" id="notelp" type="text" placeholder="0812xxxxxxxx" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Tempat Lahir</label>
                            <input class="form-control" name="tempatlahir" id="tempatlahir" placeholder="Tempat Lahir" type="text" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                            <input class="form-control" name="tgllahir" id="tgllahir" type="date" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Alamat</label>
                            <input class="form-control" name="alamat" id="alamat" placeholder="Alamat" type="text" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto" class="form-label">Upload Image</label>
                            <input type="file" class="" name="foto" id="foto">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
