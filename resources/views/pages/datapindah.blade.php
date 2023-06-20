@extends('pages.main')
@section('container')
    <div class="container-fluid py-4">
        <button type="button" class="btn btn-sm btn-success m-2" data-bs-toggle="modal" data-bs-target="#modalcarisiswa">
            Tambah Mutasi</button>
        <a href="{{ route('print') }}" class="btn btn-sm btn-danger m-2"> Print</a>
        <div class="row">
            <div class="col-12">
                @if (session('diky_success'))
                    <div class="alert alert-success" role="alert">
                        <strong style="color: white;">Success! {{ session('diky_success') }}</strong>
                    </div>
                @endif
                @if (session('diky_error'))
                    <div class="alert alert-danger" role="alert">
                        <strong style="color: white;">Error! {{ session('diky_error') }}</strong>
                    </div>
                @endif
                <div class="card mb-4">

                    <div class="table-responsive p-4 shadow-lg">
                        <div class="card p-2 m-2 bg-primary shadow-lg">
                            <h4 class="text-white text-center">
                                DATA MUTASI
                                </h3>
                        </div>
                        <table class="order-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th style="text-align: center">No.</th>
                                    <th style="text-align: center">NISN</th>
                                    <th style="text-align: center">NIK</th>
                                    <th style="text-align: center">NAMA</th>
                                    <th style="text-align: center">ALAMAT</th>
                                    <th style="text-align: center">TANGGAL KELUAR</th>
                                    <th style="text-align: center">ALASAN</th>
                            </thead>
                            <tbody>
                                @php
                                    $nomer = 1;
                                @endphp
                                @foreach ($datapindah as $data)
                                    <tr>
                                        <td style="text-align: center">{{ $nomer++ }}</td>
                                        <td style="text-align: center">{{ $data->nisn }}</td>
                                        <td style="text-align: center">{{ $data->nik }}</td>
                                        <td style="text-align: center">{{ $data->nama_siswa }}</td>
                                        <td style="text-align: center">{{ $data->alamat }}</td>
                                        <td style="text-align: center">{{ $data->updated_at->format('d M Y') }}</td>
                                        <td>{{ $data->alasan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL CARI SISWA -->
    <div class="modal fade" id="modalcarisiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                        <th style="text-align: center">NIS</th>
                                        <th style="text-align: center">NISN</th>
                                        <th style="text-align: center">Nama Siswa</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $nomer = 1;
                                    @endphp
                                    @foreach ($datasiswalulus as $data)
                                        <tr>
                                            <td style="text-align: center">{{ $nomer++ }}</td>
                                            <td style="text-align: center">{{ $data->id }}</td>
                                            <td style="text-align: center">{{ $data->nis }}</td>
                                            <td style="text-align: center">{{ $data->nisn }}</td>
                                            <td style="text-align: center">{{ $data->fullname }}</td>
                                            <td class="align-middle text-center text-sm">
                                                <button id="select" data-id="{{ $data->id }}"
                                                    data-nis="{{ $data->nis }}" data-nisn="{{ $data->nisn }}"
                                                    data-fullname="{{ $data->fullname }}"
                                                    class="btn btn-info btn-sm text-xs mb-0 px-3">
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
                <div class="modal-body">
                    <form action="{{ url('/tambahdatapindah') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">ID Siswa</label>
                                    <input class="form-control border border-dark p-1" name="id" id="id"
                                        type="text" aria-label="Isinya" readonly>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama Siswa</label>
                                    <input class="form-control border border-dark p-1" name="fullname" id="fullname"
                                        type="text" aria-label="Isinya" readonly>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">NIS Siswa</label>
                                    <input class="form-control border border-dark p-1" name="nis" id="nis"
                                        type="text" aria-label="Isinya" readonly>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">NISN Siswa</label>
                                    <input class="form-control border border-dark p-1" name="nisn" id="nisn"
                                        type="text" aria-label="Isinya" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Alasan</label>
                                <textarea class="form-control p-1 border border-dark" id="alasan" name="alasan" rows="3" required></textarea>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">TAMBAH MUTASI</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#select', function() {
                var id = $(this).data('id');
                var nis = $(this).data('nis');
                var nisn = $(this).data('nisn');
                var fullname = $(this).data('fullname');
                $('#id').val(id);
                $('#nis').val(nis);
                $('#nisn').val(nisn);
                $('#fullname').val(fullname);
            })
        })
    </script>
@endsection
