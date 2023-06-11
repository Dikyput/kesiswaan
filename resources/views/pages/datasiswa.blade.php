@extends('pages.main')
@section('container')

<div class="container-fluid py-4">
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
                    <div class="card p-3 m-3 bg-primary shadow-lg">
                    <h3 class="text-white text-center">
                        DATA PENDAFTAR
                    </h3>
                    </div>
                    <div class="table-responsive p-4 shadow-lg">
                        <table class="order-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th style="text-align: center">No.</th>
                                    <th style="text-align: center">No Pendaftaran</th>
                                    <th style="text-align: center">NIS</th>
                                    <th style="text-align: center">NISN</th>
                                    <th style="text-align: center">NIK</th>
                                    <th style="text-align: center">NAMA</th>
                                    <th style="text-align: center">MINAT BAKAT</th>
                                    <th style="text-align: center">ASAL SEKOLAH</th>
                                    <th style="text-align: center">FOTO</th>
                                    <th style="text-align: center">STATUS</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                            $nomer = 1;
                            @endphp
                            @foreach ($datasiswa as $ds)
                                <tr>
                                    <td style="text-align: center">{{$nomer++}}</td>
                                    <td style="text-align: center">{{$ds->no_pendaftar}}</td>
                                    <td style="text-align: center">{{$ds->nisn}}</td>
                                    <td style="text-align: center">{{$ds->nis}}</td>
                                    <td style="text-align: center">{{$ds->nik}}</td>
                                    <td style="text-align: center">{{ $ds->fullname }}</td>
                                    <td style="text-align: center">{{$ds->bakat}}</td>
                                    <td style="text-align: center">{{$ds->sekolah}}</td>
                                    <td style="text-align: center" name='foto' value='{{$ds->foto}}'>
                                    <img src="images/pelajar/{{$ds->foto}}" width="100"></img>
                                    </td>
                                    <td style="text-align: center">
                                    @if ($ds->status == 'PROSES')
                                    <span class="badge bg-warning" style="width: 100%;text-align: center">PROSES</span>
                                    @elseif ($ds->status == 'LULUS')
                                    <span class="badge bg-success" style="width: 100%;text-align: center">LULUS</span>
                                    @else
                                    <span class="badge bg-danger" style="width: 100%;text-align: center">DITOLAK</span>
                                    @endif  
                                    </td>
                                    <!-- Action -->
                                    <td>
                                    @if ($ds->status == 'PROSES')
                                        <button type="submit" class="btn btn-sm btn-success m-2 btn-sm" style="text-align: center"  data-bs-toggle="modal" data-bs-target="#modalterima-{{$ds->id}}">LULUS</button>

                                        <button type="submit" class="btn btn-sm btn-danger mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#modaltolak-{{$ds->id}}">TIDAK LULUS</button>
                                    @else
                                        <button type="submit" class="btn btn-sm btn-danger mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#modalbatal-{{$ds->id}}">BATAL</button>
                                    @endif
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
