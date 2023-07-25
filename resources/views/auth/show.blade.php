@extends('layouts.app')

@section('content')
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
    <ul class="m-2">
        @foreach ($project->technologies as $technology)
            <li>
                {{ $technology->nome }}
            </li>
        @endforeach
    </ul>
@endsection
