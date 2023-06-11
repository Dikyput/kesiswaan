@extends('pages.main')
@section('container')

<div class="container-fluid py-4">
<a href="{{ route('print')}}" class="btn btn-sm btn-danger"> Print</a>
    <div class="row">
        <div class="col-12">
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
                                <th style="text-align: center">NIS</th>
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
                                <td style="text-align: center">{{$nomer++}}</td>
                                <td style="text-align: center">{{$data->nis}}</td>
                                <td style="text-align: center">{{$data->nisn}}</td>
                                <td style="text-align: center">{{$data->nik}}</td>
                                <td style="text-align: center">{{$data->fullname}}</td>
                                <td style="text-align: center">{{$data->alamat}}</td>
                                <td style="text-align: center">{{$data->updated_at->format('d M Y') }}</td>
                                <td style="text-align: center">{{$data->alasan}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      });
</script>

@endsection
