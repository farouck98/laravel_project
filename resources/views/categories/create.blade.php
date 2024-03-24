@extends('layouts.app')



@section('content')
    <div class="container">
        <h1>Créer une Catégorie</h1>
        <hr>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Libellé de la catégorie</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                       required autocomplete="replyComment" autofocus name="name" id="name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mt-3" >
                <button  type="submit" class="btn btn-primary">Créer ma Catégorie</button>
            </div>
        </form>

    </div>
@endsection
