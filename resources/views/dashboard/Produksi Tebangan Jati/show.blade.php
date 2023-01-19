@extends('dashboard.layouts.main')
@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <article>
                <h2 class="mb-3">{{ $course->title }}</h2>
                <a href="/dashboard/courses" class="btn btn-success"><span class="mb-1" data-feather="arrow-left"></span> Back</a>
                <a href="/dashboard/courses/{{ $course->id }}/edit" class="btn btn-warning"><span class="mb-1" data-feather="edit"></span> Edit</a>
                <form action="/dashboard/courses/{{ $course->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are You Sure?')"><span class="mb-1" data-feather="x-circle"></span> Delete</button>
                </form>
    
                  @if($course->image)
                  <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/'.$course->image) }}" alt="" class="img-fluid mt-3">
                  </div>
                  @else
                    <img src="https://source.unsplash.com/1100x300?{{ $course->category->name }}" alt="" class="img-fluid mt-3">
                  @endif
    
                <article class="my-3 fs-6">
                    <p>{!! $course->body !!}</p>
                </article>
            </article>
        </div>
    </div>
</div>
@endsection