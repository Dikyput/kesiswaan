<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<div class="container">         
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title m-b-0">REPORT DATA MUTASI</h5>
                            </div>
                            <br>
                                <div class="table-responsive">
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
      jQuery(document).ready(function() {
    setTimeout(function() {
         window.print();
    }, 1000);
});
      </script>