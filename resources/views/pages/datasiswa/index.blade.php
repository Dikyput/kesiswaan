@extends('pages.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    @if (session('diky_success'))
                        <div class="alert alert-success" role="alert">
                            <strong style="color: white;">Success! {{ session('diky_success') }}</strong>
                        </div>
                    @endif
                    <div class="card p-3 m-3 bg-primary shadow-lg">
                        <h3 class="text-white text-center">
                            DATA SISWA
                        </h3>
                    </div>
                    <div class="table-responsive p-4 shadow-lg">
                        <table class="order-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th style="text-align: center">No.</th>
                                    <th style="text-align: center">FOTO</th>
                                    <th style="text-align: center">No Pendaftaran</th>
                                    <th style="text-align: center">NISN</th>
                                    <th style="text-align: center">NIK</th>
                                    <th style="text-align: center">NAMA</th>
                                    <th style="text-align: center">TEMPAT LAHIR</th>
                                    <th style="text-align: center">ASAL SEKOLAH</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $nomer = 1;
                                @endphp
                                @foreach ($datasiswa as $ds)
                                    <tr>
                                        <td style="text-align: center">{{ $nomer++ }}</td>
                                        <td style="text-align: center" name='foto' value='{{ $ds->foto }}'>
                                            <img src="images/pelajar/{{ $ds->foto }}" width="60"></img>
                                        </td>
                                        <td style="text-align: center">{{ $ds->no_pendaftar }}</td>
                                        <td style="text-align: center">{{ $ds->nisn }}</td>
                                        <td style="text-align: center">{{ $ds->nik }}</td>
                                        <td style="text-align: center">{{ $ds->nama_siswa }}</td>
                                        <td style="text-align: center">{{ $ds->tempat_lahir }}</td>
                                        <td style="text-align: center">{{ $ds->sekolah_asal }}</td>
                                        <!-- Action -->
                                        <td style="text-align: center">
                                            <a href="{{ route('datasiswa.show', $ds->id) }}" type="button"
                                                class="btn btn-sm btn-primary mt-3 btn-sm">Details</a>
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
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#aaaaaa", {});
    </script>
@endsection
@endsection
