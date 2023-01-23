@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Penambahan Data Laporan</h1>
</div>

<div class="row mb-5">
    <div class="col-lg-8">
        <form method="POST" action="/dashboard/laporans" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="ro" class="form-label">Inputan NilaiRO</label>
              <input type="text" class="form-control @error('ro') is-invalid @enderror" id="ro" name="ro" value="{{ old('ro') }}">
              @error('ro')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <div class="mb-3">
              <label for="real" class="form-label">Inputan Nilai REAL</label>
              <input type="text" class="form-control @error('real') is-invalid @enderror" id="real" name="real" value="{{ old('real') }}">
              @error('real')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Pilih Kategori Produksi</label>
              <select class="form-select @error('image') is-invalid @enderror" name="category_id">
                <option selected disabled><h5 class="text-muted">Pilih Produksi</h5></option>
                @foreach($categories as $category)
                    @if(old('category_id'== $category->id))
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
              <label for="bkph" class="form-label">Pilih Bkph</label>
              <select class="form-select @error('image') is-invalid @enderror" name="bkph_id">
                <option selected disabled><h5 class="text-muted">Pilih Bkph</h5></option>
                @foreach ($bkphs as $bkph)
                    @if(old('bkph_id'== $bkph->id))
                        <option value="{{ $bkph->id }}" selected>{{ $bkph->nama_bkph }}</option>
                    @else
                        <option value="{{ $bkph->id }}">{{ $bkph->nama_bkph }}</option>
                    @endif
                @endforeach
                @error('bkph')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambakan Data</button>
          </form>
    </div>
</div>


@endsection