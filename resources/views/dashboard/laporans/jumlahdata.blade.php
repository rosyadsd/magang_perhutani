@extends('dashboard.layouts.main')
@section('container')



<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2"></h1>

</div>
  <div class="container-fluid px-1 mt-1">
    <div class="card mb-2">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Nilai Rata-Rata Dari Kategori
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="laporans-table">
              <thead class="table-dark">
                <tr>
                  <th scope="col">Nilai Rata-Rata RKAP</th>
                  <th scope="col">Nilai Rata-Rata Real</th>
                  <th scope="col">Nilai Rata-Rata RO</th>
                  <th scope="col">Nilai Rata-Rata Persen RO</th>
                  <th scope="col">Nilai Rata-Rata Persen RKAP</th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                   <td>{{ $ratarkap }}</td>
                    <td>{{ $ratareal }}</td>
                    <td>{{ $rataro }}</td>
                    <td>{{ $ratapersenro}}</td>
                    <td>{{ $ratapersenrkap}}</td>
                    
                  </tr>
              </tbody>
            </table>
        </div>
    </div>
  </div>

<a href="/dashboard/laporans" class="btn btn-primary mb-3 mx-1"><span class="mb-1" data-feather="arrow-left"></span> Kembali</a>

    {{-- Data Tables --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
    <script>
    $('#laporans-table').DataTable({});
    </script>

@endsection