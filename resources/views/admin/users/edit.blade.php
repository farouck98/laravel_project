@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{!! __("Modifier <strong>:pseudo</strong>", ['pseudo' => $user->pseudo])  !!}</div>

                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label for="pseudo" class="col-md-4 col-form-label">{{ __('Pseudo') }}</label>

                                <div class="col-md-10">
                                    <input id="pseudo" type="text" class="form-control @error('pseudo') is-invalid @enderror" name="pseudo" value="{{ $user->pseudo }}" required autocomplete="pseudo" autofocus>

                                    @error('pseudo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>

                                <div class="col-md-10">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="birthdate" class="col-md-4 col-form-label">{{ __('Date de naissance') }}</label>

                                <div class="col-md-10">
                                    <input id="birthdate" type="text" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ $user->birthdate }}" required autocomplete="birthdate" autofocus>

                                    @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="row mb-3">
                                <label for="activated" class="col-md-4 col-form-label">{{ __('Statut') }}</label>

                                <div class="col-md-10">
                                    <input id="activated" type="text" class="form-control @error('activated') is-invalid @enderror" name="activated" value="{{ $user->activated }}" required autocomplete="activated" autofocus>

                                    @error('activated')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
--}}
                            @foreach($roles as $role)
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" value="{{ $role->id }}" name="roles[]" id="{{ $role->id }}"
                                    {{-- Création d'une logique qui permet de précocher le rôle que l'utilisateur avait déjà--}}
                                    @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                    <label for="{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn-primary">Modifier les informations</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
