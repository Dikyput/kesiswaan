@extends('pages.main')
@section('container')

<div class="container-fluid py-4">
<button type="button" class="btn btn-sm btn-success mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#modaltanggal">FILTER TAHUN</button>
<!-- <button type="button" class="btn btn-sm btn-warning mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#modalstatus">FILTER STATUS</button> -->
<!-- MODAL TAHUN -->
<div class="modal fade" id="modaltanggal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cari</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{url('/datasiswapertanggal')}}" method="GET">
                    {{ csrf_field() }}
            <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Tahun Angkatan</label>
                            <input class="form-control" name="dari" placeholder="2023" type="text" value="{{ date('Y') }}" aria-label="Isinya">
                        </div>
                    </div>
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

<!-- MODAL STATUS -->
<div class="modal fade" id="modalstatus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cari</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{url('/datasiswaperstatus')}}" method="GET">
                    {{ csrf_field() }}
            <div class="row">
                    <div class="col-md-8">
                        <!-- <div class="form-group">
                            <label for="example-text-input" class="form-control-label">STATUS</label>
                            <input class="form-control" name="dari" placeholder="2023" type="text" value="{{ date('Y') }}" aria-label="Isinya">
                        </div> -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="PROSES">
                            <label class="form-check-label" for="inlineRadio1">PROSES</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="LULUS">
                            <label class="form-check-label" for="inlineRadio2">LULUS</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio3" value="DITOLAK">
                            <label class="form-check-label" for="inlineRadio3">DITOLAK</label>
                        </div>
                    </div>
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


    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">No.</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">No Pendaftaran</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">NIS</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">NISN</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">NIK</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">NAMA</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">MINAT BAKAT</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">ASAL SEKOLAH</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">STATUS</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Action</th>
                                </tr>
                            </thead>
                            @php
                            $nomer = 1;
                            @endphp
                            @foreach ($datasiswa as $ds)
                            <tbody>
                                <tr>
                                    <!-- NO -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"> {{$nomer++}} </p>
                                    </td>

                                    <!-- ID Pendaftar -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"> {{$ds->no_pendaftar}} </p>
                                    </td>

                                    <!-- NISN -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"> {{$ds->nisn}} </p>
                                    </td>

                                    <!-- NIS -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"> {{$ds->nis}} </p>
                                    </td>

                                    <!-- NIK -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"> {{$ds->nik}} </p>
                                    </td>

                                    <!-- Full Name -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{ $ds->fullname }}</p>
                                    </td>

                                    <!-- Bakat -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"> {{$ds->bakat}} </p>
                                    </td>

                                    <!-- Asal Sekolah -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"> {{$ds->sekolah}} </p>
                                    </td>

                                    <!-- Status -->
                                    <td class="align-middle text-center text-sm">
                                    @if ($ds->status == 'PROSES')
                                        <span class="badge badge-warning">PROSES</span>
                                    @elseif ($ds->status == 'LULUS')
                                        <span class="badge badge-success">LULUS</span>
                                    @else
                                        <span class="badge badge-danger">DITOLAK</span>
                                    @endif  
                                    </td>
                                    <!-- Action -->
                                    <td class="align-middle text-center text-sm">
                                    @if ($ds->status == 'PROSES')
                                        <button type="submit" class="btn btn-sm btn-success mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#modalterima-{{$ds->id}}">LULUS</button>
                                        <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                            |
                                        </a>
                                        <button type="submit" class="btn btn-sm btn-danger mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#modaltolak-{{$ds->id}}">TIDAK LULUS</button>
                                    @else
                                        <button type="submit" class="btn btn-sm btn-danger mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#modalbatal-{{$ds->id}}">BATAL</button>
                                    @endif
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL -->
@foreach ($datasiswa as $data)
<div class="modal fade" id="modalterima-{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Terima</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{url('terimasiswa/'.$data->id)}}" method="POST">
                    {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nama Siswa</label>
                            <input class="form-control" type="text" value="{{$data->fullname}}" aria-label="Isinya" disabled readonly>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">NISN Siswa</label>
                            <input class="form-control" type="text" value="{{$data->nisn}}" aria-label="Isinya" disabled readonly>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">NIS Siswa</label>
                            <input class="form-control" type="text" value="{{$data->nis}}" aria-label="Isinya" disabled readonly>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Sekolah Siswa</label>
                            <input class="form-control" type="text" value="{{$data->sekolah}}" aria-label="Isinya" disabled readonly>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Terima</button>
            </div>
            </form>

        </div>
    </div>
</div>
@endforeach

<!-- MODAL TOLAK-->
@foreach ($datasiswa as $data)
<div class="modal fade" id="modaltolak-{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tolak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{url('tolaksiswa/'.$data->id)}}" method="POST">
                    {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nama Siswa</label>
                            <input class="form-control" type="text" value="{{$data->fullname}}" aria-label="Isinya" disabled readonly>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">NISN Siswa</label>
                            <input class="form-control" type="text" value="{{$data->nisn}}" aria-label="Isinya" disabled readonly>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">NIS Siswa</label>
                            <input class="form-control" type="text" value="{{$data->nis}}" aria-label="Isinya" disabled readonly>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Sekolah Siswa</label>
                            <input class="form-control" type="text" value="{{$data->sekolah}}" aria-label="Isinya" disabled readonly>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Tolak</button>
            </div>
            </form>

        </div>
    </div>
</div>
@endforeach

<!-- MODAL BATAL -->
@foreach ($datasiswa as $data)
<div class="modal fade" id="modalbatal-{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Batal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{url('batalsiswa/'.$data->id)}}" method="POST">
                    {{ csrf_field() }}
                <div class="row">
                    <p>Yakin Ingin Membatalkan.
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
@section('script')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#aaaaaa", {});
</script>
@endsection

@endsection
