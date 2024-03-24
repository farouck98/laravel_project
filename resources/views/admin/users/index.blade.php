@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Liste des Utilisateurs') }}</div>
                    <div class="container">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Pseudo</th>
                                <th scope="col">Adresse Mail</th>
                                <th scope="col">Date de Naissance</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Rôles</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->pseudo }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->birthdate }}</td>
                                <td>
                                    @if($user->email_verified_at  !== null )
                                        <span style="color: green">actif</span>
                                    @else
                                        <span style="color: red">inactif</span>
                                    @endif
                                </td>
                                <td>{{ implode('| ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td><a href="{{ route('admin.users.edit', $user->id) }}" ><button class="btn btn-primary">Editer</button></a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="post"
                                    class="{{-- une classe pourque les 2 boutons soient côte à côte--}}d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $users->links() }}
        </div>
    </div>
@endsection
