@extends('layouts.app')

@section('content')
    <div>
        <h1 class="m-4">Crea nuovo progetto <a href="{{ route('auth.create') }}">+</a></h1>
        <ul class="list-unstyled m-4">
            @foreach ($projects as $project)
                <li>
                    <a href="{{ route('auth.show', $project->id) }}">
                        {{ $project['nome'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
