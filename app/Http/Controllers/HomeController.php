<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*$topics = Topic::latest()->paginate(20);
        return view('home', compact('topics'));*/


        return view('home', [
            'topics' => Topic::latest()->with('category')->paginate(10)
        ]);

    }
}
