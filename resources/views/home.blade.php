@extends('layouts/main')

@section('container')

<div class="container">
  <div class="row pb-3 border-dark">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://source.unsplash.com/800x300?airplane" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="https://source.unsplash.com/800x300?drink" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="https://source.unsplash.com/800x300?food" class="d-block w-100" alt="...">
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

      <!--Grid column-->
      <div>
        <h2 class="center">Tentang MyLearn</h2>

        <ul class="justify list-unstyled">
          <li class="p fz"> PT myLearn merupakan sebuah industri yang bergerak dibidang jasa pelayanan makanan. PT myLearn atau dikenal dengan myLearn merupakan anak perusahaan dari PT E-Learning Company yang merupakan bagian dari Fauzan Zaman Grup. Bisnis yang dijalankan oleh myLearn adalah bisnis jasa yang memberikan pelayanan untuk memenuhi kebutuhan edukasi, diantaranya seperti pemenuhan kebutuhan edukasi makanan dan equipment. myLearn terbagi kedalam dua departemen yang bertugas memenuhi permintaan untuk pemenuhan kebutuhan edukasi, yaitu departemen production dan operation
          </li><br />
          <li class="p fz"> Saat ini, myLearn memiliki lebih dari 5.500 staf profesional dan dikenal sebagai pemimpin dalam bisnis ini, dengan produk layanan premium logistic yang disajikan ke 40 perusahaan perusahaan komersil internasional dan domestic. myLearn juga menyediakan layanan catering untuk lebih dari 20 perusahaan blue ribbon di seluruh negeri. Berbekal kekuatan pendekatan terhadap customer yang luar biasa, di tahun 2013 myLearn mendapat pengakuan 2013 Indonesian Food Support Service Provider dari Frost & Sullivan.
          </li><br />
          <li class="p fz"> Pada tahun-tahun ke depan, myLearn telah menyiapkan rencana untuk terus meningkatkan layanan berkualitas dengan secara proaktif menggali lebih banyak peluang bisnis dan mengembangkan pendekatan inovatif sebagai cara untuk selalu menjadi yang terdepan dalam memenuhi tuntutan dan ekspektasi pasar.
          </li><br />
        </ul>
        <!--Grid column-->
      </div>
      <!--Grid row-->



      <!-- conoth -->
      <div class="container p-4">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="row pb-3 border-dark col col-lg-5">
            {{-- <iframe width="800" height="300" src="https://www.youtube.com/embed/1a-ubsNUg7I" title="Aerofood ACS - Company Profile" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
            <iframe width="800" height="300" src="https://www.youtube.com/embed/lOIZmoOhJik" title="Introduction" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class=" center col-lg-6 col-md-12 mb-4 mb-md-0">

            <h2>Visi</h2>
            <p class="fz">"Menjadi Perusahaan Layanan Makanan Kelas Dunia"</p>
            <h2>Misi</h2>
            <ul class="list-unstyled fz">
              <li>Memaksimalkan nilai-nilai perusahaan untuk pemegang saham dengan meraih pengakuan dunia.</li>
              <li>Menyediakan makanan dan solusi layanan demi kepuasan pelanggan.</li>
              <li>Meningkatkan kapabilitas organisasi dengan mempercepat pengembangan sumber daya manusia dan berinovasi dalam proses dan teknologi.</li>

            </ul>
          </div>

          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- contoh -->

      <!-- Grid container -->
      <div class="container p-4">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col col-lg-5">
            {{-- <img src="https://learning-aic.aerofood.co.id/Elegantic/images/ALS.png" class="float-md-end my-4" alt="" width="180"> --}}
            <img src="/img/logo-1.png" class="float-md-end my-4" alt="" width="180">
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <h5 class="">Hubungi Kami</h5>
            <ul class="hk list-unstyled">
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                </svg>
                Jawa Tengah, Kota Semarang, Tembalang, Gondang Barat III No. 70
              </li>
              <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                </svg>
                Phone: +62 21 550 1750</li>
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </svg>
                info@myLearn.com
              </li>
            </ul>
          </div>

          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->
    </div>


    {{-- <div>
      <p class="float-end">
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-up-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z" />
          </svg></a>
      </p>
    </div> --}}


  </div>
</div>
@endsection