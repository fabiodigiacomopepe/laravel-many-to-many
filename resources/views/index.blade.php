@extends('layouts.app')

@section('content')
    <div>
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
