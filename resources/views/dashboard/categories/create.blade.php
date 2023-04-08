@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add New Category</h1>
</div>

<div class="row mb-5">
    <div class="col-lg-8">
        <form action="/dashboard/categories" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Kategori Gambar</label>
            <img alt="" class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan Update</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') }}">
            @error('keterangan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="excerpt" class="form-label">Description</label>
            @error('excerpt')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="excerpt" type="hidden" name="excerpt" value="{{ old('excerpt') }}">
            <trix-editor input="excerpt"></trix-editor>
          </div>

        <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
    </div>
</div>


<script>
    document.addEventListener('trix-file-accept', function e){
        e.preventDefault();
    }
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