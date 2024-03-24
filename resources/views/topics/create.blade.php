@extends('layouts.app')


@section('extra-js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css"
          integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <div class="container">
        <h1>Créer un sujet</h1>
        <hr>
        <form action="{{ route('topics.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Titre du Sujet</label>
                <input type="text" class="form-control bg-secondary-subtle @error('title') is-invalid @enderror"
                       name="title" id="title">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="message">Votre message:</label>
                <textarea name="message" id="message" class="bg-secondary-subtle @error('message') is-invalid @enderror"></textarea>
                @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                    <label for="formFile" class="form-label">Ajouter une image</label>
                    <input class="form-control bg-secondary-subtle" type="file" name="image" id="formFile">
                     @error('image')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                    @enderror
            </div>

            <div class="form-group">
                <label for="link" class="form-label">Ajouter un lien</label>
                <input class="form-control bg-secondary-subtle" type="text" placeholder="saisissez un lien" name="link" id="url">
                @error('link')
                <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                @enderror
            </div>

             <div class="form-group">

                      <label for="category">Catégorie: </label>
                      <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" >
                          <option value="">Sélectionner une catégorie</option>
                         @foreach($categories as $category)
                            <option @selected(old('category_id', $topic->category_id)== $category->id)value="{{ $category->id }}">{{ $category->name }} </option>
                         @endforeach
                      </select>
                      @error('category_id')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
            <div class="form-group mt-3" >
                <button  type="submit" class="btn btn-primary">Créer mon Sujet</button>
            </div>
        </form>
        @section('textarea-js')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"
                    integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#message").emojioneArea();
                });
            </script>
        @endsection
    </div>
@endsection
