<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Ce model aura plusieurs models parents

    public function commentable ()
    {
        return $this ->morphTo();
    }

    //Un commentaire peut avoir plusieurs commentaires
    public function comments()
    {
        return $this ->morphMany('App\Models\Comment', 'commentable')->latest();
    }

    //Relation Un commentaire appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
