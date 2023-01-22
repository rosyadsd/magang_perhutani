@extends("layouts.main")
@section("container")

@if ($laporans->count()>0)
    <h1 class="mb-3 text-center">{{ $laporans[0]->category->name }}</h1>    
    <div class="container">
        <div class="row-md-8">
            @foreach($laporans as $laporan)
            <div class="card mb-5 text-center ">
                @if($laporan->image)
                <div style="max-height: 300px; overflow:hidden;">
                    <img src="{{ asset('storage/'.$laporan->image) }}" alt="" class="img-fluid">
                </div>
                @else
                    <img src="https://source.unsplash.com/800x200?{{ $laporan->image }}" class="card-img-top" alt="">
                @endif
                
                <div class="card-body">
                <h5 class="card-title">{{ $laporan->title }}</h5>
                <p class="card-text">{{ $laporan->excerpt }}</p>
                <a href="/laporan/{{ $laporan->id }}" class="btn btn-primary px-5">Buka</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@else
    <p class="fs-4 text-center">No Laporan Found</p>
@endif

{{-- 
    @foreach($laporans as $laporan)
        <article class="mb-5 pb-3">
            <h2><a href="/laporan/{{ $laporan->slug }}" class="text-decoration-none">{{ $laporan->title }}</a></h2>
            <p></p>
            <p>{{ $laporan->excerpt }}</p>
         </article>
    @endforeach --}}
@endsection