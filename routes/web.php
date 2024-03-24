<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [HomepageController::class, 'index']);

Auth::routes([
    'verify' => true,
]);



//Route pour àccéder à la page d'accueil, le middleware verified c'est pour vérifier que l'utilisateur
//a cliquer sur le boution de vérification de son email
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

//Route pour les notifications
Route::get('/showFromNotification/{topic}/{notification}', 'App\Http\Controllers\TopicController@showFromNotification')->name('topics.showFromNotification');


//Route concernant l'admin
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function (){
    Route::resource('users', 'UserController');
});

//Route pour enregistrer les commentaires d'un topic
Route::post('/comments/{topic}', 'App\Http\Controllers\CommentController@store')->name('comments.store');

//Route pour enregistrer les commentaires d'un commentaire
Route::post('commentReply/{comment}', 'App\Http\Controllers\CommentController@storeCommentReply')->name('comments.store.reply');

//Créer une route pour marquer un commentaire comme solution
Route::post('/markedAsSolution/{topic}/{comment}', 'App\Http\Controllers\CommentController@markedAsSolution')->name('comments.markedAsSolution');

//Route concernant les sujets du forum
Route::resource('topics', TopicController::class)->except('index');

//Fermer un sujet
Route::put('/topics/{topic}/close', 'App\Http\Controllers\TopicController@close')->name('topics.close');

//Ouvrir un sujet
Route::put('/topics/{topic}/open', 'App\Http\Controllers\TopicController@open')->name('topics.open');


//Route crud Categorie
Route::resource('categories', CategoryController::class);
