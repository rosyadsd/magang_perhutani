@extends("layouts.main")
@section("container")

@if (count($datas) > 0)
  <h1 class="mb-3 text-center">{{ $title }}</h1>    
    <div class="container pt-5">
      <div class="row">
        <div class="card mb-3 ">
          <h5 class="card-title fs-4 d-flex justify-content-center">{{ $title }}</h5>
          <h5 class="card-title fs-4 d-flex justify-content-center">{{ $keterangan}}</h5>
          <h2 class="card-title fs-6 d-flex justify-content-center">(Dalam satuan {{ $satuan}})</h2>
           <div class="col-md-12">
            <div class="chart-wrapper">
                <canvas id="myChart1"> </canvas>
            </div>
          </div>
        </div>
          <br>
            <div class="card mb-3 ">
                <h5 class="card-title fs-4 d-flex justify-content-center">Jumlah KPH Untuk {{ $title }}</h5>
              <div class="col-md-12">
                <div class="chart-wrapper">
                  <canvas id="myChart2"></canvas>
                </div>
              </div>
            </div>
      </div>
    </div>
    <a href="/category" class="btn btn-primary mb-3 mx-1"><span class="bi bi-arrow-left"></span> Kembali</a>


@else
    <p class="fs-4 text-center">No Laporan Found</p>
@endif

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx1 = document.getElementById('myChart1');

  new Chart(ctx1, {
    type: 'bar',
    data: {
      labels:
      
      <?php
      echo "["; 
      foreach ($bkph as $b) { 
        echo "'" . $b . "',";} echo "]"; 
      ?>,

      datasets: [
      {
      label: 'RKAP',
      data:
      {!!json_encode($rkap)!!},
      borderColor: '#36A2EB',
      backgroundColor: "#A3CEB8",
      },
      {
        label: 'RO',
        data:
        {!!json_encode($ro)!!},
        borderColor: '#36A2EB',
        backgroundColor: "#92ebdf",
      
      },       
      {
        label: 'REAL',
        data: {!!json_encode($real)!!},
        borderColor: '#86deaf',
        backgroundColor: "#f0e68c",
      },
    ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

<br>
<script>
  var ctx2 = document.getElementById('myChart2');

  var myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
      labels:["Jumlah KPH"],

      datasets: [
        {
        label: 'Hasil Persen RKAP (%)',
        data:
        {!!json_encode($hasilpersenrkap)!!},
        borderColor: '#36A2EB',
        backgroundColor: "#aae9ce",

      },
      {
        label: 'Hasil Persen RO (%)',
        data:
        {!!json_encode($hasilpersenro)!!},
        borderColor: '#36A2EB',
        backgroundColor: "#a0ced9",
      },        
    ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

@endsection