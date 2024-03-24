@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{!! __("Modifier <strong>:name</strong>", ['name' => $category->name])  !!}</div>

                    <div class="card-body">
                        <form action="{{ route('categories.update', $category) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label">{{ __('Libellé') }}</label>

                                <div class="col-md-10">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Modifier Cette Catégorie</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
