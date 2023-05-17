@extends('pages.main')
@section('container')

<div class="container-fluid py-4">
<button type="button" class="btn btn-sm btn-warning mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#modalcari">CARI DATA GURU</button>

<!-- MODAL CARI -->
<div class="modal fade" id="modalcari" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cari</h5>
            </div>
            <div class="modal-body">
            <form action="{{url('/dataguru')}}" method="GET">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-info">Tampil Semua</button>
                        </form>
            <form action="{{url('/caridataguru')}}" method="GET">
                    {{ csrf_field() }}
            <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">NAMA GURU</label>
                            <input class="form-control" name="cari" placeholder="Nama Guru ..." type="text" value="{{ old('cari') }}" aria-label="Isinya">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Cari</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                <th class="text-center text-uppercase text-xxs font-weight-bolder">No.</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">NIP</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Nama</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Nomor Telepon</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Agama</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Alamat</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Aksi</th>
                                </tr>
                            </thead>
                            @php
                            $nomer = 1;
                            @endphp
                            @foreach ($dataguru as $data)
                            <tbody>
                                <tr>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{$nomer ++}}.</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{$data->nip}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{$data->nama}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{$data->notelp}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{$data->agama}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{$data->alamat}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <button type="button" class="btn btn-info btn-sm text-xs mb-0 px-3" data-bs-toggle="modal" data-bs-target="#editmodal-{{$data->id}}"
                                        data-id="{{$data->id}}" data-nip="{{$data->nip}}" data-nama="{{$data->nama}}" data-notelp="{{$data->notelp}}" data-pin="{{$data->agama}}"
                                        data-password="{{$data->password}}" data-alamat="{{$data->alamat}}" data-jk="{{$data->jk}}" data-tempatlahir="{{$data->tempatlahir}}"
                                        data-tgllahir="{{$data->tgllahir}}" data-foto="{{$data->foto}}">
                                            <i class="fas fa-list-ul"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        @if (count($dataguru) == 0)
                        <small class="d-flex justify-content-center py-2 text-dark"><i class="far fa-times-circle py-1"></i> &nbsp Data kosong</small>
                        @endif

                        @if ($dataguru->total() > 10)
                        <nav>
                            <ul class="pagination d-flex justify-content-end mt-3">
                                {{-- Previous Page Link --}}
                                @if ($dataguru->onFirstPage())
                                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                </li>
                                @else 
                                <li class="page-item">
                                    <a class="page-link" href="{{ $dataguru->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                </li>
                                @endif

                                <li class="page-item active"><a class="page-link" href="#">{{$dataguru->currentPage()}}</a></li>

                                {{-- Next Page Link --}}
                                @if ($dataguru->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $dataguru->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
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
</div>

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
            <form action="{{url('updatedataguru/'.$data1->id)}}" method="POST">
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
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Foto</label><br>
                            <img src="{{$data1->foto}}" width="200" height="300">
                            <input class="form-control" name="foto" id="foto" type="text" value="{{$data1->foto}}" required>
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
