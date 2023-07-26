@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h3>
            MODIFICA PROGETTO
        </h3>
        <form method="POST" action="{{ route('auth.update', $project->id) }}">

            @csrf
            @method('PUT')

            <label for="nome">Nome</label>
            <br>
            <input type="text" name="nome" id="nome" value="{{ $project->nome }}">
            <br>

            <label for="framework">Framework</label>
            <br>
            <input type="text" name="framework" id="framework" value="{{ $project->framework }}">
            <br>

            <label for="versione">Versione</label>
            <br>
            <input type="text" name="versione" id="versione" value="{{ $project->versione }}">
            <br>

            <label for="deployato">Deployato</label>
            <br>
            <select name="deployato" id="deployato">
                <option value="1" @if ($project->deployato) selected @endif>Sì</option>
                <option value="0" @if (!$project->deployato) selected @endif>No</option>
            </select>
            <br>

            <label for="type_id">Tipo</label>
            <br>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" @selected($project->type->id === $type->id)>
                        {{ $type->nome }}
                @endforeach
            </select>
            <br>

            <br>
            <h5>Tecnologia</h5>
            @foreach ($technologies as $technology)
                <div class="form-check mx-auto" style="max-width: 150px">
                    <input class="form-check-input bg-dark" type="checkbox" value="{{ $technology->id }}"
                        name="technologies[]" id="technology{{ $technology->id }}"
                        @foreach ($project->technologies as $projectTechnology)
                            @checked($projectTechnology -> id === $technology -> id) @endforeach>

                    <label class="form-check-label" for="technology{{ $technology->id }}">
                        {{ $technology->nome }}
                    </label>
                </div>
            @endforeach

            <input class="my-3" type="submit" value="UPDATE">

        </form>
    </div>
@endsection
