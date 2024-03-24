<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {

        return view('homepage.index');
    }
}
