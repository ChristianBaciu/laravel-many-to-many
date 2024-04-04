@extends('layouts.app')

{{-- yield di app.blade, sotto #id stamperà questo codice --}}
@section('content')
    <div class="container">

        <div class="my-4">
            <h2>Show</h2>
        </div>

        <div class="text-center">
            <h3>{{$project->titolo}}</h3>

            {{-- <figure>{{$project->cover_image}}</figure> --}}
            <div class="d-flex justify-content-center">
                @if ($project->cover_image)
                    <img class="img-fluid" src="{{asset('/storage/' . $project->cover_image)}}" alt="img">
                @endif
            </div>

            <p>{{$project->contenuto}}</p>
        </div>
    </div>
@endsection
