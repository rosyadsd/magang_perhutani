@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Laporan</h1>
</div>

<div class="row mb-5">
    <div class="col-lg-8">
        <form method="POST" action="/dashboard/bkphs/{{ $bkphs->id }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
              <label for="nama_bkph" class="form-label">BKPH</label>
              <input type="text" class="form-control @error('nama_bkph') is-invalid @enderror" id="nama_bkph" name="nama_bkph" value="{{ old('nama_bkph', $bkphs->nama_bkph) }}">
              @error('nama_bkph')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <div class="mb-3">
              <label for="alamat_bkph" class="form-label">Alamat BKPH</label>
              <input type="text" name="alamat_bkph" class="form-control @error('alamat_bkph') is-invalid @enderror" id="alamat_bkph" value="{{ old('alamat_bkph', $bkphs->alamat_bkph) }}">
              @error('alamat_bkph')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <div class="mb-3">
              <label for="no_telepon" class="form-label">No. Telephone BKPH</label>
              <input type="text" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" value="{{ old('no_telepon', $bkphs->no_telepon) }}">
              @error('no_telepon')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
    </div>
</div>

@endsection