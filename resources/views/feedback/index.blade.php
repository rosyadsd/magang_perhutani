@extends("layouts.main")
@section("container")
<div class="row justify-content-center">
  <div class="col-lg-6">
      <main class="form-registration">
          <h1 class="h3 mb-3 fw-normal text-center">Tentang</h1>

          @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          
      </main>
  </div>
</div>
@endsection