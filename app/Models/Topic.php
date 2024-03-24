<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'title',
        'message',
        'image',
        'link',
        'category_id',
        'solution',
        'closed'
    ];

    // la création d'un sujet est lié à un utilisateur)
    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    //Relation un sujet appartient à une categorie
    public function category ()
    {
        return $this->belongsTo(Category::class);
    }

    //un sujet peut avoir plusieurs commentaire
    public function comments ()
    {
        return $this->morphMany('App\Models\Comment', 'commentable')->latest();
    }

}
