@extends('layouts.main')
@section('container')
<div class="row justify-content-center mb-5">
    <div class="col-md-8">
        <article>
            <h2>{{ $course->title }}</h2>
            @if($course->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/'.$course->image) }}" alt="" class="img-fluid">
                </div>
            @else
              <img src="https://source.unsplash.com/1100x300?{{ $course->category->name }}" alt="" class="img-fluid">
            @endif
            <article class="my-3 fs-6">
                <p>{!! $course->body !!}</p>
            </article>
        </article>
        <div class="mb-3">
            <a href="/category/{{ $course->category->slug }}">Back to Course</a>
        </div>
    </div>
</div>
    
@endsection