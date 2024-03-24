<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Cete méthode c'est pourque seuls les utilisateurs qui sont connectés peuvent avoir accès à la plateforme
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //Interdir la liste des utilisateur à un simple utilisateur
        if (Gate::denies('list-users')){
            return redirect()->route('home');
        }
        $users = User::paginate(20);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //Interdir un simple utilisateur à accéder à la page d'édition des rôles  etle rediriger vers
        if (Gate::denies('edit-users')){
            return redirect()->route('home');
        }
        $roles = Role::all();
        return view('admin.users.edit',[
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'pseudo' => $request->input('pseudo'),
            'email' => $request->input('email'),
            'birthdate' => $request->input('birthdate'),
            'banner' => $request->input('banner'),
            //'activated' => $request->input('activated')
        ]);
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index')->with('success', "Information(s) sauvegardée(s) avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //Interdir un simple utilisateur de supprimer  etle rediriger vers la page d'accueil
        if (Gate::denies('delete-users')){
            return redirect()->route('home');
        }
        //On va d'abord supprimer les relations avant de supprimer l'utilisateur
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', "utilisateur supprimé");

    }
}
