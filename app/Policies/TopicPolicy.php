<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Topic;
use App\Models\User;

class TopicPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Topic $topic): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Topic $topic): bool
    {
        //Vérifier si l'utilsateur est l'auteur du sujet
        return $user->id == $topic->user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Topic $topic): bool
    {
        // Vérifier si l'utilisateur est l'auteur du sujet ou s'il a le rôle d'administrateur
        return $user->id == $topic->user->id||$user->isAdmin();
    }

    public function close(User $user, Topic $topic)
    {
        // Vérifier si l'utilisateur est l'auteur du sujet ou s'il a le rôle d'administrateur
        return $user->id == $topic->user->id||$user->isAdmin();
    }

    public function open(User $user, Topic $topic)
    {
        // Vérifier si l'utilisateur est l'auteur du sujet ou s'il a le rôle d'administrateur
        return $user->id == $topic->user->id||$user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Topic $topic): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Topic $topic): bool
    {
        //
    }
}
