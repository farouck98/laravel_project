@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>{{ __('Liste des Catégories') }}</div>
                        @can('create-categories')<a href="{{ route('categories.create') }}" ><button class="btn btn-success">Créer une catégorie</button></a>@endcan
                    </div>
                    <div class="container">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead style="text-align: center">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Catégorie</th>
                                @can('crud-categories')<th scope="col">Actions</th>@endcan
                            </tr>
                            </thead >
                            <tbody style="text-align: center">
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>

                                    @can(['edit-categories', 'delete-categories'])<td><a href="{{ route('categories.edit', $category->id) }}" ><button class="btn btn-primary">Editer</button></a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="post"
                                              class="{{-- une classe pourque les 2 boutons soient côte à côte--}}d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>@endcan
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
