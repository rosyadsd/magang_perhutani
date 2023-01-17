@extends('dashboard.layouts.main')
@section('container')
<div class="row justify-content-center mt-5">
    <h1 class="h3 mb-3 fw-normal text-center">New Administrator</h1>
    <div class="col-lg-5">
        <form action="/dashboard/users" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required>
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username') }}" required>
              @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>
@endsection