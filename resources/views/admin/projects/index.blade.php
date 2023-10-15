@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="mt-2">Elenco dei Progetti</h1>
        <a href="{{ route('admin.projects.create') }}">Aggiungi un Nuovo Progetto</a>
        {{-- <a href="{{ asset('/storage/' . $project->image)  }}">Aggiungi un Nuovo Progetto</a> --}}
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-2 me-5">
                    <div class="project-card ">
                        <div class="rounded-image mt-3 text-center">
                            <img src="{{ asset('img/section2-col-3-img6.jpg') }}" style="width: 400px" alt="">
                        </div>
                        <h3 class="mt-3 text-center">{{ $project->title }}</h3>
                        <div class="description-box mt-3">
                            <p class="p-3">{{ $project->description }}</p>
                            <div class="p-2">
                                <a href="{{ route('admin.projects.show', $project->id) }}"
                                    class="btn btn-info">dettagli</i></a>
                                <a href="{{ route('admin.projects.edit', $project->id) }}"
                                    class="btn btn-warning">modifica</a>
                            </div>
                            {{-- form per cancellare --}}
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                class="d-inline-block p-2 ">
                                @csrf()
                                @method('DELETE')

                                <button class="btn btn-danger">delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            

        </div>
    @endsection

</div>
