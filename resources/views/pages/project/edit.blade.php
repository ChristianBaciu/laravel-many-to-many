 @extends('layouts.app')

{{-- yield di app.blade, sotto #id stamperà questo codice --}}
@section('content')
    <div class="container">

        <div class="my-4">
            <h2>Modifica: {{$project->titolo}}</h2>
        </div>

        {{-- parametro '$project->id' --}}
        <form action="{{ route('dashboard.projects.update', $project->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- TITOLO --}}
            <div class="mb-3">
                <label for="titolo" class="form-label">Titolo</label>
                <input
                    type="text"
                    class="form-control"
                    name="titolo"
                    id="titolo"
                    placeholder="..."
                    value="{{ old('titolo', $project->titolo) }}"
                />
            </div>

            {{-- IMG --}}
            <div class="mb-3">
                {{-- immagine precedente --}}
                    @if ($project->cover_image)
                        <img class="img-fluid" src="{{asset('/storage/' . $project->cover_image)}}" alt="img">
                    @endif

                <label for="cover_image" class="form-label mt-2">Cambia immagine</label>
                <input
                    type="file"
                    name="cover_image"
                    id="cover_image"
                    class="form-control
                    @error('cover_image') is-invalid @enderror"
                />
            </div>

            {{-- CONTENUTO --}}
            <div class="mb-3">
                <label for="contenuto" class="form-label">Contenuto</label>
                <input
                    type="text"
                    class="form-control"
                    name="contenuto"
                    id="contenuto"
                    placeholder="..."
                    value="{{ old('contenuto', $project->contenuto) }}"
                />
            </div>

            {{-- TYPE --}}
            <div class="mb-3">
                <label for="type_id" class="form-label">Tipo</label>
                <select
                    class="form-select form-select-lg @error('type') is-invalid @enderror"
                    name="type_id"
                    id="type_id">
                    <option selected>Seleziona</option>

                        @foreach ($types as $tipo)
                        <option value="{{$tipo->id}}" {{ $tipo->id == old('type_id', $project->type_id) ? 'selected' : '' }}>
                            {{$tipo->nome}}
                        </option>
                        @endforeach

                </select>
            </div>

            {{-- TECNOLOGIA --}}
            <div class="mb-3">
                <label for="technologies" class="form-label">Tecnologia</label>
                <select
                    multiple
                    class="form-select form-select-lg"
                    name="technologies[]"
                    id="technologies"
                >
                    <option value="">Seleziona</option>

                    @forelse ($technologies as $tecnologia)
                        @if ($errors->any())
                            <option
                                value="{{$tecnologia->id }}" {{in_array($tecnologia->id, old( 'technologies', [] )) ? 'selected' : ''}}>
                                {{$tecnologia->name}}
                            </option>
                            @else
                            <option
                                value="{{$tecnologia->id }}" {{$project->technologies->contains( $tecnologia->id ) ? 'selected' : ''}}>
                                {{$tecnologia->name}}
                            </option>
                        @endif

                        @empty
                            <option value="">Non c'è nulla</option>
                    @endforelse

                </select>
            </div>

            {{-- aggiungere sempre 'type submit' --}}
            <button type="submit" class="btn btn-success">Conferma modifica</button>

        </form>
    </div>
@endsection
