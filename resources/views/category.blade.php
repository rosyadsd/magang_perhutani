<style>
  .laporan{
    color: black;
  }
</style>
@extends("layouts.main")
@section("container")

    <div class="container">
        <div class="row row-cols-3"  >

          @foreach($categories as $category)
          
          <div class="col " >
            <div class="card mb-3 " style="max-width: 540px; border-radius: 15px;">
            <img src="https://source.unsplash.com/500x300?{{ $category->slug }}" class="img-fluid rounded-top" alt="" >
                 
                <div class="card-body text-center">
                    <h5 class="card-title fs-4 d-flex justify-content-center">{{ $category->name }}</h5>
                    <p class="card-text">{!! $category->excerpt !!}</p>
                    <a href="category/{{ $category->slug }}" class="  btn btn-primary px-5 ">Buka</a>
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