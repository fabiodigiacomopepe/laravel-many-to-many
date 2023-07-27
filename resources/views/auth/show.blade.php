@extends('layouts.app')

@section('content')
    <a class="btn btn-primary m-3" href="{{ route('auth.edit', $project->id) }}">
        MODIFICA
    </a>
    @if ($project->main_picture)
        <form class="d-inline" method="POST" action="{{ route('auth.picture.delete', $project->id) }}">

            @csrf
            @method('DELETE')

            <input class="btn btn-primary" type="submit" value="ELIMINA IMMAGINE">
        </form>
    @endif
    <br>

    <img class="m-4"
        src="{{ asset($project->main_picture ? 'storage/' . $project->main_picture : 'storage/images/project.png') }}"
        width="300px">

    <ul class="list-unstyled m-4">
        <li>Nome: {{ $project['nome'] }}</li>
        <li>Framework: {{ $project['framework'] }}</li>
        <li>Versione: {{ $project['versione'] }}</li>
        <li>Deployato:
            @if ($project->deployato == 1)
                Sì
            @else
                No
            @endif
        </li>
        <li>Tipo: {{ $project->type->nome }}</li>
    </ul>

    <h4 class="mx-4">Tecnologie:</h4>
    @if (count($project->technologies) > 0)
        <ul class="m-2">
            @foreach ($project->technologies as $technology)
                <li>
                    {{ $technology->nome }}
                </li>
            @endforeach
        </ul>
    @else
        <h6 class="mx-4">Nessuna tecnologia presente</h6>
    @endif
@endsection
