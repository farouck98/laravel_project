<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
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

        $categories = Category::paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('create-categories')){
            return redirect()->route('home');
        }
        $category = new Category();
        return view('categories.create', compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:5',
        ]);
        $category = Category::create($data);

        return redirect()->route('categories.index')->with('success', "Catégorie Ajoutée");;
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        Gate::define('edit-categories', function (User $user) {
            return $user->isAdmin();
        });
        $categories = Category::select('id', 'name')->get();
        return view('categories.edit',[
            'categories' => $categories,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $category->update([
            'name' => $request->input('name')
        ]);
        return redirect()->route('categories.index')->with('success', "Catégorie sauvegardée");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //Gate pour la suppression d'une catégorie dans le cas ou c'est un simple utilsateur
        Gate::define('delete-categories', function (User $user) {
            return $user->isAdmin();
        });

        // On va d'abord détacher la catégorie avant de supprimer le sujet

        $category->delete();
        return redirect()->route('categories.index');
    }
}
