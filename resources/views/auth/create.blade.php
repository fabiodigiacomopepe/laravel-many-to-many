@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            Nuovo progetto
        </h1>
        <form method="POST" action="{{ route('auth.store') }}" enctype="multipart/form-data">

            @csrf

            <label for="main_picture">Immagine</label>
            <br>
            <input type="file" name="main_picture" id="main_picture">
            <br>

            <label for="nome">Nome</label>
            <br>
            <input type="text" name="nome">
            <br>

            <label for="framework">Framework</label>
            <br>
            <input type="text" name="framework">
            <br>

            <label for="versione">Versione</label>
            <br>
            <input type="text" name="versione">
            <br>

            <label for="deployato">Deployato</label>
            <br>
            <select name="deployato" id="deployato">
                <option value="1">
                    Sì
                </option>
                <option value="0">
                    No
                </option>
            </select>
            <br>

            <label for="type_id">Tipo</label>
            <br>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">
                        {{ $type->nome }}
                    </option>
                @endforeach
            </select>
            <br>

            <br>
            <h5>Tecnologia</h5>
            @foreach ($technologies as $technology)
                <div class="form-check mx-auto" style="max-width: 150px">
                    <input class="form-check-input bg-dark" type="checkbox" value="{{ $technology->id }}"
                        name="technologies[]" id="technology{{ $technology->id }}">

                    <label class="form-check-label" for="technology{{ $technology->id }}">{{ $technology->nome }}</label>
                </div>
            @endforeach

            <input class="my-3" type="submit" value="CREATE">
        </form>
    </div>
@endsection
