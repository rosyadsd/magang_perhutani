<style>
  .laporan{
    color: black;
  }
</style>
@extends("layouts.main")
@section("container")

    <div class="container pt-5">
        <div class="row row-cols-3 pt-4"  >

          @foreach($categories as $category)
          
          <div class="col " >
            <div class="card mb-3 " style="max-width: 540px; border-radius: 15px;">
            <img src="{{ $category->image_url }}" class="img-fluid rounded-top" alt="" class="img-fluid">
                 
                <div class="card-body text-center">
                    <h5 class="card-title fs-4 d-flex justify-content-center">{{ $category->name }}</h5>
                    <p class="card-text">{!! $category->excerpt !!}</p>
                    <a href="category/{{ $category->id }}" class="  btn btn-primary px-5 ">Buka</a>
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
