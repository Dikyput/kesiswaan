@extends('pages.main')
@section('container')

<div class="container-fluid py-2">
    <div class="row">
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
        <div class="col-12">
            <div class="card mb-4">

                <div class="table-responsive p-4 shadow-lg">
                    <div class="card p-2 m-2 bg-primary shadow-lg">
                        <h4 class="text-white text-center">
                            DATA KELAS
                            </h3>
                    </div>
                    <table class="order-hover" id="myTable2">
                        <thead>
                            <tr>
                                <th style="text-align: center">No.</th>
                                <th style="text-align: center">Nama Kelas</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $nomer = 1;
                            @endphp
                            @foreach ($kelas as $data)
                            <tr>
                                <td style="text-align: center">{{$nomer++}}</td>
                                <td style="text-align: center">{{$data->nama}}</td>
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
                    @if (count($kelas) == 0)
                    <small class="d-flex justify-content-center py-2 text-dark"><i class="far fa-times-circle py-1"></i>
                        &nbsp Data kosong</small>
                    @endif

                    @if ($kelas->total() > 10)
                    <nav>
                        <ul class="pagination d-flex justify-content-end mt-3">
                            {{-- Previous Page Link --}}
                            @if ($kelas->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true"
                                aria-label="@lang('pagination.previous')">
                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                            </li>
                            @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $kelas->previousPageUrl() }}" rel="prev"
                                    aria-label="@lang('pagination.previous')">&lsaquo;</a>
                            </li>
                            @endif

                            <li class="page-item active"><a class="page-link" href="#">{{$kelas->currentPage()}}</a>
                            </li>

                            {{-- Next Page Link --}}
                            @if ($kelas->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $kelas->nextPageUrl() }}" rel="next"
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

@foreach ($kelas as $data)
<!-- MODAL Hapus Kelas -->
<div class="modal fade" id="hapusmodal-{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Batal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{url('hapusnamakelas/'.$data->id)}}" method="POST">
                    {{ csrf_field() }}
                <div class="row">
                    <p>Yakin Ingin Menghapus Kelas {{$data->nama}}.
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

@endsection