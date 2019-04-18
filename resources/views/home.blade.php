@extends('layouts.app')

@section('judul')
    Halaman Utama ~
@endsection
@section('content')
<section class="content-header">
    <h1 class="pull-left">Dashboard</h1>
</section>
    <div class="content">
        <div class="clearfix"></div>
        <br>
        <div class="row">
            <div class="col-md-3 col-md-push-1">
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-user"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text"><b>Total Murid</b></span>
                    <span class="info-box-number">{{$murid}}</span>
                    <span class="progress-description">
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-md-push-3">
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-user"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text"><b>Total Guru</b></span>
                    <span class="info-box-number">{{$guru}}</span>
                    <span class="progress-description">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <h3 class="text-center">Grafik Jumlah Murid Diterima Per Tahun</h3 class="text-center">
            <canvas id="canvas" height="180" width="600"></canvas>
        </div>
    </div>
@endsection
@section('scripts')
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
@endsection
