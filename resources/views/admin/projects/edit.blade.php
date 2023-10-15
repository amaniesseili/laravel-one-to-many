@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea un Nuovo Progetto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf()
            @method('PATCH')

            <div class="mb-3">
                <label for="image" class="form-label">Immagine del Progetto</label>
                <input type="file" class="form-control" name="image"
                    placeholder="inserici il link dell'immagine">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Titolo Del Progetto</label>
                <input type="text" class="form-control" name="title" value="{{$project->title}}" placeholder="inserici il titolo del progetto">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione del Progetto</label>
                <textarea class="form-control" name="description" value="{{$project->description}}"id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">aggiorna </button>

        </form>

        

        {{-- link per tornare all'elenco dei progetti --}}
        <a href="{{ route('admin.projects.index') }}">Torna all'elenco dei Progetti</a>

    </div>
@endsection
