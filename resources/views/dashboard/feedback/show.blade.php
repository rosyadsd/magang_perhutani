@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Feedback Detail</h1>
</div>

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <a href="/dashboard/feedbacks" class="btn btn-success"><span data-feather="arrow-left"></span> Back</a>
            <form action="/dashboard/feedbacks/{{ $feedback->id }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are You Sure?')"><span data-feather="x-circle"></span>Delete</button>
            </form>
            <div class="mb-3 row">
                <label for="staticName" class="col-sm-2 col-form-label">Name :</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticName" value="{{ $feedback->name }}" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email :</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $feedback->email }}" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticType" class="col-sm-2 col-form-label">Type :</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticType" value="{{ $feedback->type }}" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticBody" class="col-sm-2 col-form-label">Description :</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticBody" value="{!! $feedback->body !!}" disabled>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection