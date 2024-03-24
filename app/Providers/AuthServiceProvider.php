<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //Créer un gate pour l'admin pour le crud des catégories
        Gate::define('crud-categories', function (User $user) {
            return $user->hasAnyRole(['administrateur']);
        });

        Gate::define('create-categories', function (User $user) {
            return $user->hasAnyRole(['administrateur']);
        });
        //Gate pour interdir l'édition d'une catégorie dans le cas ou c'est un utilisateurs
        Gate::define('edit-categories', function (User $user) {
            return $user->isAdmin();
        });
        //Gate pour la suppression d'une catégorie dans le cas ou c'est un simple utilsateur
        Gate::define('delete-categories', function (User $user) {
            return $user->isAdmin();
        });

        //Gate pour le droit de voir la liste des catégories
        Gate::define('list-categories', function (User $user) {
            return $user->isAdmin();
        });



        //Créer un gate pour l'admin pour le crud des utilisateurs
        Gate::define('manage-users', function (User $user) {
            return $user->hasAnyRole(['administrateur']);
        });

        //Gate pour le droit d'édition d'un utilisateur dans le cas ou c'est un administrateur
        Gate::define('edit-users', function (User $user) {
            return $user->isAdmin();
        });

        //Gate pour le droit de suppression d'un utilisateur dans le cas ou c'est un administrateur
        Gate::define('delete-users', function (User $user) {
            return $user->isAdmin();
        });

        //Gate pour le droit de voir la liste des utilisateurs
        Gate::define('list-users', function (User $user) {
            return $user->isAdmin();
        });
    }
}
