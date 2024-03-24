@extends('layouts.app')

@section('extra-js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css"
          integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{!! __("Modifier <strong>:title</strong>", ['title' => $topic->title])  !!}</div>

                    <div class="card-body">
                        <form action="{{ route('topics.update', $topic) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label">{{ __('Titre') }}</label>

                                <div class="col-md-10">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $topic->title }}" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="message" class="col-md-4 col-form-label">{{ __('Votre message') }}</label>

                                <div class="col-md-10">
                                    <textarea id="message" type="text" cols="20" rows="5" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ $topic->message }}" required autocomplete="message" autofocus>
                                        </textarea>

                                    @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="formFile" class="col-md-4 col-form-label">{{ __('Modififer votre image') }}</label>
                                <input class="form-control" type="file" name="image" id="formFile">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="link" class="form-label">Modifier le lien</label>
                                <input class="form-control" type="text" value="{{ $topic->link }}" name="link" id="url">
                                @error('link')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="message" class="col-md-4 col-form-label">{{ __('Catégorie') }}</label>

                                <div class="col-md-10">
                                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" >
                                        <option value="">Sélectionner une catégorie</option>
                                        @foreach($categories as $category)

                                            <option @if(optional($topic->category)->id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }} </option>

                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Modifier les informations</button>
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
                </div>
            </div>
        </div>
    </div>
@endsection
