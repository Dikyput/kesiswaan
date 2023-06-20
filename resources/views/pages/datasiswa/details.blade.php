@extends('pages.main')
@section('container')
    <div class="container">
        <div class="main-body">
            <a href="{{ route('datasiswa.index') }}" type="button" class="btn btn-sm btn-primary mt-3 btn-sm">KEMBALI</a>
            @foreach ($datasiswa as $datasiswa)
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="../images/pelajar/{{ $datasiswa->foto }}" alt="Admin"
                                        class="rounded-circle" width="150">
                                    <div class="mt-1">
                                        <h5>{{ $datasiswa->nama_siswa }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nomor Pendaftaran</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $datasiswa->no_pendaftar }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nama Lengkap</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $datasiswa->nama_siswa }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">NISN</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $datasiswa->nisn }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">No Telp</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $datasiswa->no_tlp }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Gender</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $datasiswa->jns_kelamin }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Tempat Lahir</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $datasiswa->tempat_lahir }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Tanggal Lahir</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $datasiswa->tgl_lahir }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Agama</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $datasiswa->agama }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Asal Sekolah</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $datasiswa->sekolah_asal }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Status Keluarga</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $datasiswa->sts_dlm_keluarga }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Tanggal Diterima</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $datasiswa->tgl_diterima }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Anak Ke</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $datasiswa->anak_ke }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama Ibu</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $datasiswa->nama_ibu }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Alamat Ortu</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $datasiswa->alamat_ortu }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
