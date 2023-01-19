@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Produksi Tebangan Jati</h1>
</div>

<div class="table-responsive col-lg-12">
    <a href="/dashboard/courses/create" class="btn btn-primary mb-3 mx-1"><span class="mb-1" data-feather="plus"></span> Tambahkan Data</a>
    <a href="/dashboard/courses/recycle" class="btn btn-success mb-3"><span class="mb-1" data-feather="trash"></span> Tempat Data</a>
  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="container-fluid px-1 mt-1">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Semua Data Laporan Tebangan Jati
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="courses-table">
              <thead class="table-dark">
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">BKPH</th>
                  <th scope="col">RKAP</th>
                  <th scope="col">RO</th>
                  <th scope="col">Real</th>
                  <th scope="col">%RKAP</th>
                  <th scope="col">%RO</th>
                  <th scope="col">Bulan</th>
                  <th scope="col">Jumlah KPH</th>
                  <th scope="col">Category</th>
                  {{-- <th scope="col">Created By</th> --}}
                  <th scope="col">Created At</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($courses as $course)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $course->bkph }}</td>
                    <td>{{ $course->rkap }}</td>
                    <td>{{ $course->ro }}</td>
                    <td>{{ $course->real }}</td>
                    <td>{{ $course->persenrkap }}</td>
                    <td>{{ $course->persenro }}</td>
                    <td>{{ $course->bulan }}</td>
                    <td>{{ $course->jumlahkph }}</td>
                    <td>{{ $course->category->name }}</td>
                    {{-- <td>{{ $course->author->name }}</td> --}}
                    <td>{{ $course->created_at->toDateString() }}</td>
                    <td>
                      <a href="/dashboard/courses/{{ $course->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                      <a href="/dashboard/courses/{{ $course->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                      <form action="/dashboard/courses/{{ $course->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"><span data-feather="trash-2"></span></button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
  </div>
  {{-- <table id="courses-table" class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Created By</th>
        <th scope="col">Created At</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($courses as $course)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $course->title }}</td>
          <td>{{ $course->category->name }}</td>
          <td>{{ $course->author->name }}</td>
          <td>{{ $course->created_at->toDateString() }}</td>
          <td>
            <a href="/dashboard/courses/{{ $course->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/courses/{{ $course->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/courses/{{ $course->id }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"><span data-feather="trash-2"></span></button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table> --}}
</div>


    {{-- Data Tables --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
    <script>
    $('#courses-table').DataTable({});
    </script>

@endsection