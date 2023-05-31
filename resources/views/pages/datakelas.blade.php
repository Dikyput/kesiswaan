@extends('pages.main')
@section('container')

<div class="container-fluid py-4">
<div class="row">
        <div class="col-12">
            <div class="card mb-2">
                    <div class="table-responsive p-4 shadow-lg">
                        <div class="card p-1 m-1 bg-primary shadow-lg">
                            <h4 class="text-white text-center">
                                 TAMBAH KELAS
                            </h3>
                        </div>
                    <form action="{{url('/tambahkelas')}}" method="POST">
                        {{ csrf_field() }}
                    <div class="form-row m-2">
                        <div class="col p-3">
                        <span class="badge bg-primary">INPUT NAMA KELAS</span>
                            <input type="text" name="namakelas" id="namakelas" required class="p-2 form-control border border-dark" placeholder="Nama Kelas">
                            </div>
                            <div class="col p-3 ">
                            <span class="badge bg-primary">INPUT ID GURU</span>
                            <input type="text" name="guru_id" id="guru_id" required class="p-2 form-control border border-dark" placeholder="ID Guru">
                            </div>
                            <button type="submit" class="btn btn-success m-3 btn-lg" data-bs-toggle="modal" data-bs-target="#modalcari">TAMBAH KELAS</button>
                        </div>
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
                                 DATA KELAS
                            </h3>
                        </div>
                        <table class="order-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th style="text-align: center">No.</th>
                                    <th style="text-align: center">Nama Kelas</th>
                                    <th style="text-align: center">Guru Wali</th>
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
                                    <td class="align-middle text-center text-sm">
                                        <button type="button" class="btn btn-info btn-sm text-xs mb-0 px-3" data-bs-toggle="modal" data-bs-target="#editmodal-{{$data->id}}">
                                            <i class="fas fa-list-ul"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (count($datakelas) == 0)
                        <small class="d-flex justify-content-center py-2 text-dark"><i class="far fa-times-circle py-1"></i> &nbsp Data kosong</small>
                        @endif

                        @if ($datakelas->total() > 10)
                        <nav>
                            <ul class="pagination d-flex justify-content-end mt-3">
                                {{-- Previous Page Link --}}
                                @if ($datakelas->onFirstPage())
                                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                </li>
                                @else 
                                <li class="page-item">
                                    <a class="page-link" href="{{ $datakelas->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                </li>
                                @endif

                                <li class="page-item active"><a class="page-link" href="#">{{$datakelas->currentPage()}}</a></li>

                                {{-- Next Page Link --}}
                                @if ($datakelas->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $datakelas->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
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
<div class="modal fade" id="editmodal-{{$data1->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Details Dan Edit {{$data1->namakelas}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{url('updatedatakelas/'.$data1->id)}}" method="POST">
                    {{ csrf_field() }}
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">ID GURU ( Ubah Wali Kelas )</label>
                            <input class="form-control" name="guru_id" id="guru_id" type="text" value="{{$data1->guru_id}}" required>
                        </div>
                    </div>
                    <hr>
                    <label for="example-text-input" class="form-control-label">Details</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">NIP</label>
                            <input class="form-control" name="nip" id="nip" type="text" readonly value="{{$data1->guru->nip}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nama Wali</label>
                            <input class="form-control" name="nama" id="nama" type="text" readonly value="{{$data1->guru->nama}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">No. Telp</label>
                            <input class="form-control" name="password" id="password" type="text" readonly value="{{$data1->guru->notelp}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Jenis Kelamin</label>
                            <input class="form-control" name="jk" id="jk" type="text" readonly value="{{$data1->guru->jk}}" required>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Foto</label><br>
                            <img src="{{$data1->guru->foto}}" width="200" height="300">
                            <input class="form-control" name="foto" id="foto" type="text" readonly value="{{$data1->foto}}" required>
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

@endsection
