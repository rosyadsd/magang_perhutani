<style>
  .course{
    color: black;
    background-image: linear-gradient(to right, white, #FFF5EE)
  }
</style>
@extends("layouts.main")
@section("container")
    <h1 class="mb-3 text-center">All Courses</h1>
    <div class="container">
        <div class="row row-cols-2">

          @foreach($categories as $category)
          <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="course row g-0">
                <div class="col-md-4">
                  <img src="https://source.unsplash.com/500x800?{{ $category->slug }}" class="img-fluid rounded-start" alt="">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title fs-4">{{ $category->name }}</h5>
                    <p class="card-text">{!! $category->excerpt !!}</p>
                    {{-- <p class="card-text"><small class="text-muted">Author: {{ $course->author }}</small></p> --}}
                    <a href="category/{{ $category->slug }}" class="btn btn-primary px-5 stretched-link">Learn</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          
        </div>
      </div>
      
<div class="d-flex justify-content-center">
  {{ $categories->links() }}
</div>
      
@endsection