<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Topic;
use App\Models\User;
use App\Notifications\NewCommentPosted;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //Etre connecté pour pouvoir écrire un commentaire
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Méthode pour enregistrer le commentaire d'un topic
    public function store(Topic $topic)
    {
        \request()->validate([
            'message' => 'required|min:5'
        ]);

        //Création d'une variable pour un nouveau commentaire
        $comment = new Comment();

        $comment->message = \request('message');

        //Récupération de l'utilisateur connecté qui commente à traver la relation user()
        $comment->user_id = auth()->user()->id;

        //Enregistrement du topic commenté par l'utilisateur connecté grâce à la relation comments()
        $topic->comments()->save($comment);

        //Notification
        $topic->user->notify(new NewCommentPosted($topic, auth()->user()));

        return redirect()->route('topics.show', $topic);





    }

    public function storeCommentReply(Comment $comment)
    {
        \request()->validate([
            'replyComment' => 'required|min:5'
        ]);

        //Création d'une variable pour un nouveau commentaire à un commentaire existant
        $commentReply = new Comment();

        $commentReply->message = \request('replyComment');

        //Récupération de l'utilisateur connecté qui commente le commentaire à travers la relation user()
        $commentReply->user_id = auth()->user()->id;

        //Enregistrement du commentaire par l'utilisateur connecté grâce à la relation comments()
        $comment->comments()->save($commentReply);

        return redirect()->back();

    }
    public function markedAsSolution(Topic $topic, Comment $comment)
    {
        if (auth()->user()->id == $topic->user_id){
            $topic->solution = $comment->id;
            $topic->save();

            return response()->json(['success' => ['success' => 'Marqué comme solution']], 200);
        } else{
            return response()->json(['errors' => ['error' => 'Utilisateur non valide']], 401);
        }
    }

}
