@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>
            Nuovo progetto
        </h1>
        <form method="POST" action="{{ route('auth.store') }}">

            @csrf

            <label for="nome_project">Nome</label>
            <br>
            <input type="text" name="nome_project">
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
            <input type="number" name="deployato">
            <br>

            <label for="type_id">Type_ID</label>
            <br>
            <input type="number" name="type_id">
            <br>

            <label for="nome_type">Tipo</label>
            <br>
            <input type="text" name="nome_type">
            <br>

            <label for="di_gruppo">Di gruppo</label>
            <br>
            <input type="number" name="di_gruppo">
            <br>

            <label for="nome_technology">Tecnologia</label>
            <br>
            <input type="text" name="nome_technology">
            <br>

            <label for="descrizione">Descrizione</label>
            <br>
            <input type="text" name="descrizione">
            <br>

            <input class="my-3" type="submit" value="CREATE">
        </form>
    </div>
@endsection
