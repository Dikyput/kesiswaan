@extends('pages.main')
@section('container')

<div class="container-fluid py-4">
<button type="button" class="btn btn-sm btn-info mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#modalcetaksemua">CETAK SEMUA MUTASI</button>
<!-- MODAL TAHUN -->
<div class="modal fade" id="modaltanggal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cari</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{url('/')}}" method="GET">
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
            <form action="{{url('/')}}" method="GET">
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
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">NAMA</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">NIS</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">NISN</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">NIK</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">ALAMAT</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">TAHUN KELUAR</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">ALASAN</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder">Action</th>
                                </tr>
                            </thead>
                            @php
                            $nomer = 1;
                            @endphp

                            <tbody>
                                <tr>
                                    <!-- NO -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">  </p>
                                    </td>

                                    <!-- NAMA -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">  </p>
                                    </td>

                                    <!-- NIS -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">  </p>
                                    </td>

                                    <!-- NISN -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">  </p>
                                    </td>

                                    <!-- NIK -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">  </p>
                                    </td>

                                    <!-- Alamat -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0"></p>
                                    </td>

                                    <!-- Tahun Keluar -->
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">  </p>
                                    </td>

                                    <!-- Alasan -->
                                    <td class="align-middle text-center text-sm">
                                        <!-- <button type="submit" class="btn btn-sm btn-info mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#modalterima">CETAK</button> -->
                                    </td>

                                    <!-- Alasan -->
                                    <td class="align-middle text-center text-sm">
                                        <!-- <button type="submit" class="btn btn-sm btn-info mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#modalterima">CETAK</button> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
