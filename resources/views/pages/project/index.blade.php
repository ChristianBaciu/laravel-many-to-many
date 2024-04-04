@extends('layouts.app')

{{-- yield di app.blade, sotto #id stamperà questo codice --}}
@section('content')
    <div class="container">

        <div class="d-flex gap-2 my-4">
            <h2>Tabella</h2>
            {{-- <button class="btn btn-success">Crea</button> --}}
            <a href="{{ route('dashboard.projects.create')}}"
                class="btn btn-primary d-flex align-items-center">
                Crea
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-secondary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">TITOLO</th>
                        <th scope="col">CONTENUTO</th>
                        <th scope="col">IMMAGINE</th>
                        <th scope="col">AZIONI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>
                                <a href="{{route('dashboard.projects.show', $item->id)}}">
                                    {{$item->titolo}}
                                </a>
                            </td>
                            <td>{{$item->contenuto}}</td>
                            <td>{{$item->cover_image}}</td>

                            <td>
                                <div class="d-flex gap-2">
                                    {{-- <button class="btn btn-warning">Modifica</button> --}}
                                    <a href="{{ route('dashboard.projects.edit', $item->id)}}"
                                        class="btn btn-warning">
                                        Modifica
                                    </a>
                                    {{-- <button class="btn btn-danger">Elimina</button> --}}
                                    <form method="POST" action="{{route('dashboard.projects.destroy', $item->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Elimina</button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
