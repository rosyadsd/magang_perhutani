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
              <label for="rkap" class="form-label">Inputan Nilai RKAP</label>
              <input type="number" class="form-control @error('rkap') is-invalid @enderror" onkeyup= "sum();" id="rkap" name="rkap" value="{{ old('rkap') }}">
              @error('rkap')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <div class="mb-3">
              <label for="ro" class="form-label">Inputan Nilai RO</label>
              <input type="number" class="form-control @error('ro') is-invalid @enderror" onkeyup= "sum();" id="ro" name="ro" value="{{ old('ro') }}">
              @error('ro')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <div class="mb-3">
              <label for="real" class="form-label">Inputan Nilai REAL</label>
              <input type="number" class="form-control @error('real') is-invalid @enderror" onkeyup= "sum();" id="real" name="real" value="{{ old('real') }}">
              @error('real')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <div class="mb-3">
              <label for="persen_ro" class="form-label">Hasil Dari Persen RO</label>
              <input type="number" class="form-control @error('persen_ro') is-invalid @enderror" onkeyup= "sum();" id="persen_ro" name="persen_ro" value="{{ old('persen_ro') }}" readonly>
              @error('persen_ro')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <div class="mb-3">
              <label for="persen_rkap" class="form-label">Hasil Persen RKAP</label>
              <input type="number" class="form-control @error('persen_rkap') is-invalid @enderror" onkeyup= "sum();" id="persen_rkap" name="persen_rkap" value="{{ old('persen_rkap') }}" readonly>
              @error('persen_rkap')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="bulan" class="form-label">Pilih Bulan</label>
              <select class="form-select @error('image') is-invalid @enderror" name="bulan_id">
                <option selected disabled><h5 class="text-muted">Pilih Bulan</h5></option>
                @foreach ($bulans as $bulan)
                    @if(old('bulan_id'== $bulan->id))
                        <option value="{{ $bulan->id }}" selected>{{ $bulan->nama_bulan }}</option>
                    @else
                        <option value="{{ $bulan->id }}">{{ $bulan->nama_bulan }}</option>
                    @endif
                @endforeach
                @error('bulan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </select>
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

<script>
  function sum(){
      var txtFirstNumberValue = document.getElementById('ro').value;
      var txtSecondNumberValue = document.getElementById('real').value;
      var txtThirdNumberValue = document.getElementById('rkap').value;
      var txtFourNumberValue = 100
      var hasilro = parseInt(txtSecondNumberValue) / parseInt(txtThirdNumberValue)* parseInt(txtFourNumberValue);
      var hasilrkap = parseInt(txtSecondNumberValue) / parseInt(txtFirstNumberValue)* parseInt(txtFourNumberValue);
      if (!isNaN(hasilro,hasilrkap)){
        document.getElementById('persen_ro').value = hasilro;
        document.getElementById('persen_rkap').value = hasilrkap;
      }
}
</script>


@endsection