@extends('layout')
@section('content')
<!-- Content Row -->
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-4 col-md-4 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Mahasiswa</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-user fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-4 col-md-4 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Dosen</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-user fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-4 col-md-4 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Alumni</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-user fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

<!-- Content Row -->
<!-- Bagian Penutup Kepala Info Template -->

<div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Grafik Stok</h6>
                </div>
                <div class="card-body">
                  {{-- grafik --}}
                  <canvas id="BarChart" width="100%" height="50"></canvas>
                  {{-- grafik --}}
                </div>
              </div>
            </div>
          </div>
          <script>
            var lbls = {{ Js::from($lbl) }};
            var kendaraans = {{ js::from($dt) }};
            var ctx = document.getElementById('BarChart');
            var BarChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: lbls,
                datasets: [{
                  label: "Jumlah stock kendaraan",
                  backgroundColor: 'rgba(2,117,216,1)',
                  borderColor: 'rgba(2,117,216,1)',
                  data: kendaraans,
                }],
              },
              options: {
                sclaes: {
                  xAxes: [{
                    time: {
                      unit: 'kendaraan'
                    },
                    gridLines: {
                      display: false
                    },
                    ticks: {
                      maxTicksLimit: 6
                    }
                  }],
                  yAxes: [{
                    ticks: {
                      min: 0,
                      max: 10,
                      maxTicksLimit: 5
                    },
                    gridLines: {
                      display: true
                    }
                  }],
                },
                legend: {
                  display: false
                }
              }
            })
          </script>
@endsection