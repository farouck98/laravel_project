<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Cete méthode c'est pourque les utilisateurs non connnectés puissent voir
    //La liste des sujets
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topic = new Topic();
        $categories = Category::select('id', 'name')->get();
        return view('topics.create', compact(['topic','categories']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2',
            'message' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'link' => 'nullable|url',
            'category_id' => 'required|exists:categories,id'
        ]);

        $data = [
            'title' => $request->title,
            'message' => $request->message,
            'category_id' => $request->category_id
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/topic/';
            $file->move($path, $filename);
            $data['image'] = $path.$filename;
        }
        if ($request->has('link')){
            $data['link'] = $request->link;
        }

        // Création du sujet avec les données validées
        $topic = auth()->user()->topics()->create($data);

        return redirect()->route('topics.show', $topic->id);
    }





    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        $categories = Category::select('id', 'name')->get();
        return view('topics.show', compact(['topic', 'categories']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        //Policy qui permet seul à l'utilisateur qui a créé son sujet de le modifier
        $this->authorize('update', $topic);
        $categories = Category::select('id', 'name')->get();
        return view('topics.edit', compact(['topic', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        //Policy qui permet seul à l'utilisateur qui a créé son sujet d'enregistrer une modification
        $this->authorize('update', $topic);

        $request->validate([
            'title' => 'required|min:2',
            'message' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'link' => 'nullable|url',
            'category_id' => 'required|exists:categories,id'
        ]);

        $data = [
            'title' => $request->title,
            'message' => $request->message,
            'category_id' => $request->category_id
        ];

        //Traitement de l'image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/topic/';
            $file->move($path, $filename);
            $data['image'] = $path.$filename;

            // Supprimer l'ancienne image si elle existe
            if ($topic->image) {
                Storage::delete($topic->image);
            }
        }

        if ($request->has('link')){
            $data['link'] = $request->link;
        }

        $topic->update($data);
        return redirect()->route('topics.show', ['topic' => $topic->id])->with('success', "Information(s) sauvegardée(s) avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {

        //Policy qui permet seul à l'utilisateur qui a créé son sujet ou à l'administrateur de le supprimer
        $this->authorize('delete', $topic);

        // On va d'abord détacher la catégorie avant de supprimer le sujet
        $topic->category()->dissociate();
        $topic->save(); // Enregistrez le sujet pour appliquer la dissociation

        $topic->delete();
        return redirect()->route('home');

    }
    public function close(Topic $topic)
    {
        $this->authorize('close', $topic);
        $topic->update(['closed' => true]);

        return redirect()->route('topics.show', $topic->id);
    }

    public function open(Topic $topic)
    {
        $this->authorize('close', $topic);
        $topic->update(['closed' => false]);

        return redirect()->route('topics.show', $topic->id);
    }

    public function showFromNotification(Topic $topic, DatabaseNotification $notification)
    {
        $notification->markAsRead();
        return view('topics.show', compact('topic'));
    }
}
