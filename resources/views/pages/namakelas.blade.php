@extends('pages.main')
@section('container')
    <div class="container-fluid py-2">
        <button type="button" class="btn btn-sm btn-success m-2" data-bs-toggle="modal" data-bs-target="#modaltambah"> Tambah
            Kelas</button>
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
                        <table class="order-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th style="text-align: center">No.</th>
                                    <th style="text-align: center">Tingkat</th>
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
                                        <td style="text-align: center">{{ $nomer++ }}</td>
                                        <td style="text-align: center">{{ $data->tingkatkelas->kelas }}</td>
                                        <td style="text-align: center">{{ $data->nama }}</td>
                                        <td class="align-middle text-center text-sm">
                                            <button type="button" class="btn btn-danger btn-sm text-xs mb-0 px-3"
                                                data-bs-toggle="modal" data-bs-target="#hapusmodal-{{ $data->id }}">
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

    <!-- MODAL Tambah Kelas -->
    <div class="modal fade" id="modaltambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Nama Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/tambahnamakelas') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col">
                                <span class="badge bg-primary">Tingkat Kelas</span>
                                <select class="form-select p-2" name="tingkat_kelas" id="tingkat_kelas"
                                    aria-label="Default select example">
                                    @foreach ($datakelas as $data)
                                        <option value="{{ $data->id }}">{{ $data->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <span class="badge bg-primary">Nama Kelas</span>
                                <input type="text" name="nama" id="nama" required
                                    class="p-2 form-control border border-dark" placeholder="Nama Kelas" required>
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

    @foreach ($kelas as $data)
        <!-- MODAL Hapus Kelas -->
        <div class="modal fade" id="hapusmodal-{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('hapusnamakelas/' . $data->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <p>Yakin Ingin Menghapus Kelas {{ $data->nama }}.
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
