@extends("layouts.main")
@section("container")

@if ($courses->count()>0)
    <h1 class="mb-3 text-center">{{ $courses[0]->category->name }}</h1>    
    <div class="container">
        <div class="row-md-8">
            @foreach($courses as $course)
            <div class="card mb-5 text-center ">
                @if($course->image)
                <div style="max-height: 300px; overflow:hidden;">
                    <img src="{{ asset('storage/'.$course->image) }}" alt="" class="img-fluid">
                </div>
                @else
                    <img src="https://source.unsplash.com/800x200?{{ $course->image }}" class="card-img-top" alt="">
                @endif
                
                <div class="card-body">
                <h5 class="card-title">{{ $course->title }}</h5>
                <p class="card-text">{{ $course->excerpt }}</p>
                <a href="/course/{{ $course->id }}" class="btn btn-primary px-5">Buka</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@else
    <p class="fs-4 text-center">No Course Found</p>
@endif

{{-- 
    @foreach($courses as $course)
        <article class="mb-5 pb-3">
            <h2><a href="/course/{{ $course->slug }}" class="text-decoration-none">{{ $course->title }}</a></h2>
            <p></p>
            <p>{{ $course->excerpt }}</p>
         </article>
    @endforeach --}}
@endsection