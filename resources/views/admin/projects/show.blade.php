@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Dettagli Progetto: {{ $project->title }}</h1>
        {{-- <img src="{{ $project->image }}" alt="" class="img-fluid"> --}}

        <img src="{{ asset('/storage/' . $project->image )}}" alt="" class="img-fluid">

        <p>{{ $project->description }}</p>

        {{-- link per tornare all'elenco dei progetti --}}
        <a href="{{ route('admin.projects.index') }}">Torna all'elenco dei Progetti</a>


    </div>
@endsection
