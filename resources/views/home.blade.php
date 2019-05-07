@extends('layouts.app')

@section('judul')
    Halaman Utama ~
@endsection
@section('content')
<section class="content-header">
</section>
    <div class="content">
        <div class="clearfix"></div>
        <br>
        @hasanyrole('tenaga-umum|administrator|guru')
        <div class="row">
            <div class="col-md-3 col-md-push-1">
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-user"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Total Murid</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="info-box-number">{{$murid}}</span>
                    <span class="progress-description">
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-md-push-3">
                <div class="info-box bg-blue">
                    <span class="info-box-icon"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Total Guru</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="info-box-number">{{$guru}}</span>
                    <span class="progress-description">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <h3 class="text-center">Grafik Jumlah Murid Diterima Per Tahun</h3 class="text-center">
            <canvas id="canvas" style="width: 90%; height: 250px;margin-left: 20px"></canvas>
        </div>
        @endhasanyrole

        <div class="row">

            <div class="col-lg-6">
                <div class="info-box">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Mahasiswa</h3>
                            <div class="icon">
                                <i class="fa fa-graduation-cap">M</i>
                            </div>  
                        </div>
                        <ul>
                            <li>Melihat Data Pribadi</li>
                            <li>Melihat Nilai Mata Pelajaran</li>
                            <li>Melihat Nilai Karakter</li>
                            <li>Melihat Pelanggaran Yang Di Lakukan</li>
                            <li>Melihat Perizinan Yang di Setujui</li>
                            <li>Melihat Catatan Pembayaran SPP</li>
                            <li>Melihat Rapot</li>
                            <li>Melihat Ijazah</li>
                            <li>Melihat Kelas</li>
                            <li>Melihat Mata Pelajaran</li>
                            <li>Melihat Guru Pengampu Mata Pelajaran</li>
                            <li>Cetak Rapot</li>
                            <li>Cetak Ijazah</li>
                            <li>Ubah Password</li>
                        </ul>          
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="info-box">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Guru</h3>
                            <div class="icon">
                                <i class="fa fa-users">G</i>
                            </div>  
                        </div>
                        <ul>
                            <li>Melihat Data Pribadi</li>
                            <li>Melihat Data Pribadi Murid</li>
                            <li>Melihat Nilai Karakter</li>
                            <li>Melihat Pelanggaran Murid</li>
                            <li>Melihat Perizinan Murid</li>
                            <li>Melihat Kelas</li>
                            <li>Melihat Mata Pelajaran</li>
                            <li>Cetak Rapot</li>
                            <li>Cetak Ijazah</li>
                            <li>Input & Update Data Nilai Sesuai yang diajarkan</li>
                            <li>Input & Update Perizinan Murid</li>
                            <li>Input & Update Pelanggaran Murid</li>
                            <li>Ubah Password</li>
                        </ul>          
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

                <div class="col-lg-6">
                    <div class="info-box">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>Tenaga Umum</h3>
                                <div class="icon">
                                    <i class="fa fa-user-secret">TU</i>
                                </div>  
                            </div>
                            <ul>
                                <li>Melihat Data Pribadi</li>
                                <li>Cetak Rapot</li>
                                <li>Cetak Ijazah</li>
                                <li>Manajemen Murid</li>
                                <li>Manajemen Nilai Murid</li>
                                <li>Manajemen Kelas</li>
                                <li>Manajemen Mata Pelajaran</li>
                                <li>Manajemen Guru</li>
                                <li>Manajemen Pengampu Mata Pelajaran</li>
                                <li>Manajemen Perizinan & Pelanggaran Murid</li>
                                <li>Manajemen Semester</li>
                                <li>Generate Kenaikan Kelas</li>
                                <li>Ubah Password</li>
                            </ul>          
                        </div>
                    </div>
                </div>
    
                <div class="col-lg-6">
                    <div class="info-box">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>Administrator</h3>
                                <div class="icon">
                                    <i class="fa fa-gear">A</i>
                                </div>  
                            </div>
                            <ul>
                                <li>Semua Fitur</li>
                                <li>Manajemen User</li>
                            </ul>          
                        </div>
                    </div>
                </div>
    
            </div>
    </div>
@endsection
@section('scripts')
    @hasanyrole('administrator|tenaga-umum|guru')
    <script>
        var url = "{{url('/home')}}";
        var Tahun = new Array();
        var Murid = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            response.tahun.forEach(function(data){
                Tahun.push(data.ANGKATAN);
            });
            response.murid.forEach(function(data){
                Murid.push(data.murid);
            });
            var ctx = document.getElementById("canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels: Tahun,
                      label : 'Tahun Ajaran',
                      datasets: [{
                          label: 'Jumlah Murid Per Tahun',
                          data: Murid,
                          borderWidth: 2,
                          lineTension: 0,
                          fill: false,
                          borderColor: 'green',
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
          });
        });
    </script>
    @endhasanyrole
@endsection
