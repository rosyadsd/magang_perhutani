@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Course</h1>
</div>

<div class="row mb-5">
    <div class="col-lg-8">
        <form method="POST" action="/dashboard/courses/{{ $course->id }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Course Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $course->title) }}">
              @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" name="category_id">
                <option selected disabled aria-placeholder="choose">Choose Category Course</option>
                @foreach($categories as $category)
                    @if(old('category_id',$course->category_id)== $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
                @error('category')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </select>
            </div>

            <div class="mb-3">
              <label for="image" class="form-label">Course Image</label>
              <input type="hidden" name="oldImage" value="{{ $course->image }}">
              @if($course->image)
              <img src="{{ asset('storage/'. $course->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
              @else
              <img class="img-preview img-fluid mb-3 col-sm-5">
              @endif

              <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
              @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="body" class="form-label">Body</label>
              @error('body')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input id="body" type="hidden" name="body" value="{{ old('body', $course->body) }}">
              <trix-editor input="body"></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
          </form>
    </div>
</div>

<script>
    // document.addEventListener('trix-file-accept', function e){
    //     e.preventDefault();
    // }

    function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }
</script>


@endsection