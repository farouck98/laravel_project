@extends('layouts.app')

@section('content')

<div class="container">
  {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>--}}
    <div class="list-group justify-content-center ">
        @foreach ($topics as $topic)
            <div class="form-control mt-3 bg-secondary-subtle">
                <span class="badge text-bg-secondary"> {{ $topic->category->name }}</span>
                <h4><a href="{{ route('topics.show', ['topic' => $topic->id]) }}">{{ $topic->title }}</a></h4>
                <p>{{ $topic->message }}
                    @if ($topic->link)
                        <a href="{{ $topic->link }}" class="text-decoration-none" target="_blank" title="{{ $topic->link }}">{{ Str::limit($topic->link, 40) }}</a>
                    @endif</p>



                @if($topic->image)
                    <img src="{{ url("$topic->image") }}" style="text-align: center; width: 150px" />
                @endif
                <div class="d-flex justify-content-between align-items-center">
                    <small>Posté le {{ $topic->created_at->format('d/m/Y à H:m') }}</small>
                    <span class="badge text-bg-info">{{ $topic->user->pseudo }}</span>
                </div>

                @if($topic->user->banner)
                    <div class="d-flex justify-content-center">
                        <span class="badge text-bg-dark "> "{{ $topic->user->banner }}"</span>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $topics->links() }}
    </div>

</div>

@endsection
