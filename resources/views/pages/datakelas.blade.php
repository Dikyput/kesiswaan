@extends('pages.main')
@section('container')

<div class="container-fluid py-2">
    <div class="row">
        <div class="col-12">
                @if (session('diky_success'))
                <div class="alert alert-success" role="alert">
                    <strong style="color: white;">Success! {{ session('diky_success') }}</strong>
                </div>
                @endif
                @if (session('diky_hapus'))
                <div class="alert alert-success" role="alert">
                    <strong style="color: white;">Success! {{ session('diky_hapus') }}</strong>
                </div>
                @endif
                @if (session('diky_error'))
                <div class="alert alert-danger" role="alert">
                <strong style="color: white;">Error! {{ session('diky_error') }}</strong>
                </div>
                @endif
            <div class="card col-xl-8 col-sm-6 mb-xl-0 mb-4 offset-2">
                <div class="table-responsive p-4 shadow-lg">
                    <div class="card p-1 m-1 bg-primary shadow-lg">
                        <h4 class="text-white text-center">
                            PILIH KELAS
                            </h3>
                    </div>
                    <form action="{{url('/tambahkelas')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-row m-2">                            
                                <div class="col">
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalcarikelas">Cari Kelas</button>
                                    </div>
                                <div class="row">
                                    <div class="col">
                                        <span class="badge bg-primary">ID KELAS</span>
                                        <input type="number" name="kelas_id" id="kelas_id" required
                                        class="p-2 form-control border border-dark" placeholder="ID Guru" required>
                                    </div>
                                    <div class="col">
                                        <span class="badge bg-primary">NAMA KELAS</span>
                                        <input type="text" name="namakelas" id="nama" required
                                            class="p-2 form-control border border-dark" placeholder="Nama Kelas" required>
                                    </div>
                                </div>
                                    <div class="col mt-3">
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalcariguru">Cari Guru</button>
                                    </div>
                                <div class="row">
                                    <div class="col">
                                        <span class="badge bg-primary">ID GURU</span>
                                        <input type="number" name="guru_id" id="guru_id" required
                                        class="p-2 form-control border border-dark" placeholder="ID Guru" required>
                                    </div>
                                    <div class="col">
                                        <span class="badge bg-primary">NAMA GURU</span>
                                        <input type="text" name="guru_nama" id="guru_nama" required
                                            class="p-2 form-control border border-dark" placeholder="Nama Guru" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success m-2 btn-sm">TAMBAH KELAS</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">

                <div class="table-responsive p-4 shadow-lg">
                    <div class="card p-2 m-2 bg-primary shadow-lg">
                        <h4 class="text-white text-center">
                            DATA WALI KELAS
                            </h3>
                    </div>
                    <table class="order-hover" id="myTable2">
                        <thead>
                            <tr>
                                <th style="text-align: center">No.</th>
                                <th style="text-align: center">Nama Kelas</th>
                                <th style="text-align: center">Guru Wali</th>
                                <th style="text-align: center">Foto</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $nomer = 1;
                            @endphp
                            @foreach ($datakelas as $data)
                            <tr>
                                <td style="text-align: center">{{$nomer++}}</td>
                                <td style="text-align: center">{{$data->namakelas}}</td>
                                <td style="text-align: center">{{$data->guru->nama}}</td>
                                <td style="text-align: center" name='foto' value='{{$data->foto}}'>
                                    <img src="images/staff/{{$data->guru->foto}}" width="50"></img>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <button type="button" class="btn btn-info btn-sm text-xs mb-0 px-3"
                                        data-bs-toggle="modal" data-bs-target="#editmodal-{{$data->id}}">
                                        <i class="fas fa-list-ul"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm text-xs mb-0 px-3"
                                        data-bs-toggle="modal" data-bs-target="#hapusmodal-{{$data->id}}">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (count($datakelas) == 0)
                    <small class="d-flex justify-content-center py-2 text-dark"><i class="far fa-times-circle py-1"></i>
                        &nbsp Data kosong</small>
                    @endif

                    @if ($datakelas->total() > 10)
                    <nav>
                        <ul class="pagination d-flex justify-content-end mt-3">
                            {{-- Previous Page Link --}}
                            @if ($datakelas->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true"
                                aria-label="@lang('pagination.previous')">
                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                            </li>
                            @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $datakelas->previousPageUrl() }}" rel="prev"
                                    aria-label="@lang('pagination.previous')">&lsaquo;</a>
                            </li>
                            @endif

                            <li class="page-item active"><a class="page-link" href="#">{{$datakelas->currentPage()}}</a>
                            </li>

                            {{-- Next Page Link --}}
                            @if ($datakelas->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $datakelas->nextPageUrl() }}" rel="next"
                                    aria-label="@lang('pagination.next')">&rsaquo;</a>
                            </li>
                            @else
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                <span class="page-link" aria-hidden="true">&rsaquo;</span>
                            </li>
                            @endif
                        </ul>
                    </nav>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDIT -->
@foreach ($datakelas as $data1)
<div class="modal fade" id="editmodal-{{$data1->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Details Kelas {{$data1->namakelas}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <label for="example-text-input" class="form-control-label">Details</label>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">NIP</label>
                                <input class="form-control" name="nip" id="nip" type="text" readonly
                                    value="{{$data1->guru->nip}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Wali</label>
                                <input class="form-control" name="nama" id="nama" type="text" readonly
                                    value="{{$data1->guru->nama}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">No. Telp</label>
                                <input class="form-control" name="password" id="password" type="text" readonly
                                    value="{{$data1->guru->notelp}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jenis Kelamin</label>
                                <input class="form-control" name="jk" id="jk" type="text" readonly
                                    value="{{$data1->guru->jk}}" required>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Foto</label><br>
                                <img src="images/staff/{{$data1->guru->foto}}" width="200" height="300">
                                <input class="form-control" name="foto" id="foto" type="text" readonly
                                    value="{{$data1->guru->foto}}" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($datakelas as $data)
<!-- MODAL Hapus Kelas -->
<div class="modal fade" id="hapusmodal-{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Batal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{url('hapuskelas/'.$data->id)}}" method="POST">
                    {{ csrf_field() }}
                <div class="row">
                    <p>Yakin Ingin Menghapus Kelas {{$data->namakelas}}.
                </div>
                <input class="form-control" name="guru_id" id="guru_id" type="text" readonly value="{{$data->guru->id}}" hidden>
                <input class="form-control" name="kelas_id" id="kelas_id" type="text" readonly value="{{$data->kelas->id}}" hidden>
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

<!-- MODAL CARI GURU -->
<div class="modal fade" id="modalcariguru" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cari</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
                    <div class="col">
                                <table class="order-hover" id="myTable5">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">No.</th>
                                            <th style="text-align: center">ID</th>
                                            <th style="text-align: center">Guru Wali</th>
                                            <th style="text-align: center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $nomer = 1;
                                        @endphp
                                        @foreach ($dataguru as $data)
                                        <tr>
                                            <td style="text-align: center">{{$nomer++}}</td>
                                            <td style="text-align: center">{{$data->id}}</td>
                                            <td style="text-align: center">{{$data->nama}}</td>
                                            <td class="align-middle text-center text-sm">
                                            <button id="select" data-id="{{$data->id}}" data-nama="{{$data->nama}}" class="btn btn-info btn-sm text-xs mb-0 px-3" data-bs-dismiss="modal">
                                                PILIH
                                            </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>  
        </div>
    </div>
</div>

<!-- MODAL CARI KELAS -->
<div class="modal fade" id="modalcarikelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cari</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
                    <div class="col">
                                <table class="order-hover" id="myTable1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">No.</th>
                                            <th style="text-align: center">ID</th>
                                            <th style="text-align: center">Nama Kelas</th>
                                            <th style="text-align: center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $nomer = 1;
                                        @endphp
                                        @foreach ($namakelas as $data)
                                        <tr>
                                            <td style="text-align: center">{{$nomer++}}</td>
                                            <td style="text-align: center">{{$data->id}}</td>
                                            <td style="text-align: center">{{$data->nama}}</td>
                                            <td class="align-middle text-center text-sm">
                                            <button id="select2" data-idk="{{$data->id}}" data-namak="{{$data->nama}}" class="btn btn-info btn-sm text-xs mb-0 px-3" data-bs-dismiss="modal">
                                                PILIH
                                            </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>  
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            $('#guru_id').val(id);
            $('#guru_nama').val(nama);
        })
    })
    $(document).ready(function() {
        $(document).on('click', '#select2', function() {
            var idk = $(this).data('idk');
            var namak = $(this).data('namak');
            $('#kelas_id').val(idk);
            $('#nama').val(namak);
        })
    })
</script>

@endsection