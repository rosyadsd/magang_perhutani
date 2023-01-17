@extends('layouts.main')

@section('container')
<div class="container mb-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-signin">
            <form action="/login" method="POST">
              @csrf
                <div class="text-center">
                    {{-- <img class="mb-4" src="https://learning-aic.aerofood.co.id/Elegantic/images/ALS.png" alt="" length="140" height="80"> --}}
                    <img class="mb-4" src="/img/logo-1.png" alt="" length="140" height="80">
                </div>
              <h2 class="h3 mb-3 fw-normal text-center">Login Admin</h2>

              @if(session()->has('registerSuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('registerSuccess') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              @if(session()->has('loginError'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
          
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
            {{-- <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Now!</a></small> --}}
          </main>
    </div>
</div>

</div>

@endsection