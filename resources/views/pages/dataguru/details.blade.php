@extends('pages.main')
@section('container')
    <div class="container">
        @if (session('diky_success'))
            <div class="alert alert-success" role="alert">
                <strong style="color: white;">Success! {{ session('diky_success') }}</strong>
            </div>
        @endif
        <div class="main-body">
            <a href="{{ route('dataguru.index') }}" type="button" class="btn btn-sm btn-danger mt-3 btn-sm">KEMBALI</a>
            @foreach ($dataguru as $dataguru)
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="../images/staff/{{ $dataguru->foto }}" alt="Admin" class="rounded-circle"
                                        width="150">
                                    <div class="mt-1">
                                        <h5>{{ $dataguru->nama }}</h5>
                                    </div>

                                    <div class="mt-1">
                                        @if ($dataguru->wali_kelas == 0)
                                            <h5>Belum Menjadi Wali Kelas</h5>
                                        @else
                                            @foreach ($datawalikelas as $datawalikelas)
                                                <h5>Wali Kelas : {{ $datawalikelas->kelas->tingkatkelas->kelas }}
                                                    {{ $datawalikelas->kelas->nama }}</h5>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <form action="{{ route('dataguru.update', $dataguru->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">NIP</h6>
                                        </div>
                                        <div class="col-sm-9 ">
                                            <input type="number" name="nip" id="nip" required
                                                class="p-2 form-control border border-dark" value="{{ $dataguru->nip }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama Lengkap</h6>
                                        </div>
                                        <div class="col-sm-9 ">
                                            <input type="text" name="nama" id="nama" required
                                                class="p-2 form-control border border-dark" value="{{ $dataguru->nama }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">No Telp</h6>
                                        </div>
                                        <div class="col-sm-9 ">
                                            <input type="number" name="notelp" id="notelp" required
                                                class="p-2 form-control border border-dark" value="{{ $dataguru->notelp }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Gender</h6>
                                        </div>
                                        <div class="col-sm-9 ">
                                            <select class="form-select p-2" name="jk" id="jk"
                                                aria-label="Default select example">
                                                <option selected value="{{ $dataguru->jk }}">{{ $dataguru->jk }}</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Agama</h6>
                                </div>
                                <div class="col-sm-9 ">
                                    <input type="text" name="agama" id="agama" required
                                        class="p-2 form-control border border-dark" value="{{ $dataguru->agama }}"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Tempat Lahir</h6>
                                </div>
                                <div class="col-sm-9 ">
                                    <input type="text" name="tempatlahir" id="tempatlahir" required
                                        class="p-2 form-control border border-dark" value="{{ $dataguru->tempatlahir }}"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Alamat</h6>
                                </div>
                                <div class="col-sm-9 ">
                                    <input type="text" name="alamat" id="alamat" required
                                        class="p-2 form-control border border-dark" value="{{ $dataguru->alamat }}"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Upload Foto</h6>
                                </div>
                                <div class="col-sm-3">
                                    <input type="file" class="" name="foto" id="foto" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary mt-3 btn-sm">UPDATE</button>
                </form>
            @endforeach
        </div>
    </div>
@endsection
