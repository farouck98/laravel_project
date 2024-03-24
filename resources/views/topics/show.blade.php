@extends('layouts.app')

@section('extra-js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css"
          integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        function togglleReplyComment(id){
            let element = document.getElementById("replyComment-" + id);
            element.classList.toggle('d-none');
        }
    </script>
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body bg-dark-subtle">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">{{ $topic->title }}</a></h5>
                    @can('close', $topic)
                        <form action="{{ route('topics.close', $topic->id) }}" method="post">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-danger">Fermer le sujet</button>
                        </form>
                    @endcan
                </div>
                    <span class="badge text-bg-secondary"> {{ $topic->category->name }}</span>

                    <p>{{ $topic->message }}@if ($topic->link)
                        <a href="{{ $topic->link }}" target="_blank" title="{{ $topic->link }}">{{ Str::limit($topic->link, 40) }}</a>
                    @endif</p>

                    @if($topic->image)
                        <img src="{{ url("$topic->image") }}" style="text-align: center; width: 150px" />
                    @endif

                <div class="d-flex justify-content-between align-items-center">
                    <small>Posté le {{ $topic->created_at->format('d/m/Y à H:m') }}</small>
                     <span class="badge text-bg-info">Par {{ $topic->user->pseudo }}</span>

                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">

                    {{--seul l'utilisateur qui a créé le topic peut le modifier--}}
                    @can('update',$topic)
                    <a href="{{ route('topics.edit', $topic) }}" class="btn btn-warning">Editer</a>
                    @endcan

                    {{--seul l'utilisateur qui a créé le topic ou l'administratur peut le supprimer--}}
                    @can('delete', $topic)
                    <form action="{{ route('topics.destroy', $topic)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    @endcan
                </div>
                    <hr>
                    @if(!$topic->closed)
                    <h5>Commentaires:</h5>
                    {{-- Afficher les commentaires --}}
                    @forelse($topic->comments as $comment)
                        <div class="card mb-2 ">
                            <div class="card-body d-flex justify-content-between">

                                <div>
                                    {{ $comment->message }}
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small>Posté le {{ $comment->created_at->format('d/m/Y') }}</small>
                                        <span class="badge text-bg-info">Par {{ $comment->user->pseudo }}</span>
                                    </div>
                                </div>
                                <div>
                                    {{-- Vérifier si l'utilisateur connecté est propriétaire du Topic pour lui
                                    afficher le boutton--}}
                                    @if(!$topic->solution && auth()->user()->id == $topic->user_id)
                                        <solution-button topic-id="{{ $topic->id }}" comment-id="{{ $comment->id }}"></solution-button>
                                    @else
                                        @if($topic->solution == $comment->id)
                                            <h5><span class="badge text-bg-secondary">
                                                    Marqué comme Solution</span></h5>
                                        @endif
                                    @endif
                                </div>
                            </div>

                        </div>
                        {{-- Afficher les commentaires à un commentaire--}}
                        @foreach($comment->comments as $replyComment)
                            <div class="card mb-2 ms-5">
                                <div class="card-body">
                                    {{ $replyComment->message }}
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small>Posté le {{ $replyComment->created_at->format('d/m/Y') }}</small>
                                        <span class="badge text-bg-info">Par {{ $replyComment->user->pseudo }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- Répondre à un commentaire --}}
                        <button class="btn btn-info mb-3" onclick="togglleReplyComment({{ $comment->id }})">Répondre à ce commentaire</button>
                        <form action="{{ route('comments.store.reply', $comment) }}" class="d-none" id="replyComment-{{ $comment->id }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="replyComment" class="col-md-4 col-form-label">{{ __('Votre message') }}</label>

                                <div class="col-md-10">
                                    <textarea id="replyComment" type="text" cols="20" rows="5" class="form-control @error('replyComment') is-invalid @enderror" name="replyComment">
                                        </textarea>
                                    @error('replyComment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ">Répondre</button>
                        </form>
                            @section('textarea-js')
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"
                                        integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $("#replyComment").emojioneArea();
                                    });
                                </script>
                            @endsection
                    @empty
                        <div class="alert alert-info">Aucun commentaire pour ce sujet</div>
                    @endforelse
                    <form action="{{ route('comments.store', $topic) }}" class="mt-3" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="message" class="col-md-4 col-form-label">{{ __('Votre message') }}</label>

                            <div class="col-md-10">
                                    <textarea id="message" type="text" cols="20" rows="5" class="form-control @error('message') is-invalid @enderror" name="message">
                                        </textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Commenter un topic--}}
                        <button type="submit" class="btn btn-success">Soumettre mon commentaire</button>
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
                    @else
                        <p class="bg-secondary-subtle" style="text-align: center">Le sujet est fermé, aucun message
                        ne peut être créé</p>
                        @can('open', $topic)
                            <form action="{{ route('topics.open', $topic->id) }}" method="post">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-success"> Réouvrir le sujet?</button>
                            </form>

                        @endcan
                    @endif
                 </div>

        </div>

    </div>

    <hr>
@endsection
