@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Recycle Bin</h1>
</div>

<div class="table-responsive col-lg-12">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="container-fluid px-1 mt-1">
    <div class="card mb-2">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Deleted Courses
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="courses-table">
              <thead class="table-dark">
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Title</th>
                  <th scope="col">Category</th>
                  {{-- <th scope="col">Created By</th> --}}
                  <th scope="col">Deleted At</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($courses as $course)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->category->name }}</td>
                    {{-- <td>{{ $course->author->name }}</td> --}}
                    <td>{{ $course->deleted_at->toDateString() }}</td>
                    <td>
                      <a href="/dashboard/courses/restore/{{ $course->id }}" class="badge bg-success"><span data-feather="rotate-ccw"></span></a>
                      <form action="/dashboard/courses/delete/{{ $course->id }}" method="POST" class="d-inline">
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

<a href="/dashboard/courses" class="btn btn-primary mb-3 mx-1"><span class="mb-1" data-feather="arrow-left"></span> Back</a>

    {{-- Data Tables --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
    <script>
    $('#courses-table').DataTable({});
    </script>

@endsection