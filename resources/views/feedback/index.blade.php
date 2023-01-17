@extends("layouts.main")
@section("container")
<div class="row justify-content-center">
  <div class="col-lg-6">
      <main class="form-registration">
          <h1 class="h3 mb-3 fw-normal text-center">Feedback Form</h1>

          @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <form action="/feedback" method="POST">
            @csrf
            <div class="row mb-3">
              <label for="name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
              </div>
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="row mb-3">
              <label for="email" name="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
              </div>
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            </div>
            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Type</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="type" id="type1" value="Comments" checked>
                  <label class="form-check-label" for="type1">
                    Comments
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="type" id="type2" value="Suggestions">
                  <label class="form-check-label" for="type2">
                    Suggestions
                  </label>
                </div>
                <div class="form-check disabled">
                  <input class="form-check-input" type="radio" name="type" id="type3" value="Questions">
                  <label class="form-check-label" for="type3">
                    Questions
                  </label>
                </div>
              </div>
            </fieldset>
            <div class="mb-3">
              <label for="body" class="form-label">Describe your feedback</label>
              <textarea class="form-control @error('body') is-invalid @enderror" id="body" rows="3" name="body"></textarea>
            </div>
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Submit</button>
          </form>
        </main>
  </div>
</div>
@endsection