@extends("layouts.main")
@section("container")

@if (count($datas) > 0)
  <h1 class="mb-3 text-center">{{ $title }}</h1>    
    <div class="container pt-5">
      <div class="row">
        <div class="card mb-3 ">
          <h5 class="card-title fs-4 d-flex justify-content-center">{{ $title }}</h5>
          <h5 class="card-title fs-4 d-flex justify-content-center">{{ $keterangan}}</h5>
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
                      <canvas id="myChart2">
                        </canvas>
                  </div>
          </div>
        </div>
      </div>
    </div>


@else
    <p class="fs-4 text-center">No Laporan Found</p>
@endif

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  let warna1 = '#ff0000';
  let warna2 = '#ffff00';
  let warna3 = '#00ff00';
  let warna4 = '#0000ff';
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
        backgroundColor: "#56d798",
      //   backgroundColor: function(context) {
      //   let value = context.dataset.data[context.dataIndex];
      //   if (value < 85) {
      //     return warna1;
      //   } else if (value >= 85 && value < 100) {
      //     return warna2;
      //   } else if (value >= 100 && value < 110) {
      //     return warna3;
      //   } else {
      //     return warna4;
      //   }
      // }
      },
      {
        label: 'RO',
        data:
        {!!json_encode($ro)!!},
        borderColor: '#36A2EB',
        backgroundColor: "#92ebdf",
      //   backgroundColor: function(context) {
      //   let value = context.dataset.data[context.dataIndex];
      //   if (value < 85) {
      //     return warna1;
      //   } else if (value >= 85 && value < 100) {
      //     return warna2;
      //   } else if (value >= 100 && value < 110) {
      //     return warna3;
      //   } else {
      //     return warna4;
      //   }
      // }
      },        {
        label: 'REAL',
        data: {!!json_encode($real)!!},
        borderColor: '#86deaf',
      //   backgroundColor: function(context) {
      //   let value = context.dataset.data[context.dataIndex];
      //   if (value < 85) {
      //     return warna1;
      //   } else if (value >= 85 && value < 100) {
      //     return warna2;
      //   } else if (value >= 100 && value < 110) {
      //     return warna3;
      //   } else {
      //     return warna4;
      //   }
      // }
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
        label: 'Hasil Persen RKAP',
        data:
        {!!json_encode($hasilpersenrkap)!!},
        borderColor: '#36A2EB',
        backgroundColor: "#56d798",
      },
      {
        label: 'Hasil Persen Ro',
        data:
        {!!json_encode($hasilpersenro)!!},
        backgroundColor: function(context) {
        let value = context.dataset.data[context.dataIndex];
        if (value < 85) {
          return warna1;
        } else if (value >= 85 && value < 100) {
          return warna2;
        } else if (value >= 100 && value < 110) {
          return warna3;
        } else {
          return warna4;
        }
      }
      },        
      {
        label: 'Jumlah RKAP KPH',
        data: {!!json_encode($jumrkap)!!},
        backgroundColor: function(context) {
        let value = context.dataset.data[context.dataIndex];
        if (value < 85) {
          return warna1;
        } else if (value >= 85 && value < 100) {
          return warna2;
        } else if (value >= 100 && value < 110) {
          return warna3;
        } else {
          return warna4;
        }
      }
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