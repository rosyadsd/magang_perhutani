@extends('layouts/main')

@section('container')

<div class="container pt-5">
  <div class="row pb-3 border-dark pt-4">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://www.perhutani.co.id/wp-content/uploads/2022/03/pinus.webp" class="rounded mx-auto d-block img-fluid " alt="..."
          style='height: 95%; width: 80%;'>
        </div>
        <div class="carousel-item">
          <img src="https://www.perhutani.co.id/wp-content/uploads/2022/03/Kayu-Jati.webp" class="rounded mx-auto d-block img-fluid" alt="..."
          style='height: 95%; width: 80%;'>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <style>
      .center {
        text-align: center;
      }
      .p {
        text-indent: 40px;
      }
      .fz {
        font-size: 16px;
      }
      .hk {
        font-size: 12px;
      }
      .justify {
        text-align: justify;
      }
    </style>

      <div class="container p-4">
        <div class="row">
          <div class="row pb-3 border-dark col-lg-6">
            <iframe width="800" height="300" src="https://www.youtube.com/embed/szR9NFf4x88" title="Introduction" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>

          <div class="text-center col-lg-6">
            <h2>Visi</h2>
            <p class="fz">"Menjadi Perusahaan Pengelola Hutan Berkelanjutan dan Bermanfaat Bagi Masyarakat"</p>
            <h2>Misi</h2>
            <ul class="list-unstyled fz">
              <li>Mengelola Sumberdaya Hutan Secara Lestari.</li>
              <li>Peduli Kepada Kepentingan Masyarakat dan Lingkungan.</li>
              <li>Mengoptimalkan Bisnis Kehutanan dengan Prinsip Good Corporate Governance.</li>
            </ul>
          </div>
        </div>
      </div>

  </div>
</div>
@endsection
