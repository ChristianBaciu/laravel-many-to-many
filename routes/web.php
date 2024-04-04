<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

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

// alla chiamata del localhost di base, chiamerà 'welcome'
Route::get('/', function () {
    return view('welcome');
});

// la rotta '/dashboard' è gestita dal 'middleware'
// il 'middleware' è una funzione che filtra la richiesta HTTP di 'auth', 'verified'
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// rotta del profilo, gestito dal 'ProfileController' , basato su 3 funzione ('edit', 'update', 'destroy')
// basato sul controllo CRUD,
// ad ogni singola rotta hanno dato una funzione/metodo con un 'name'

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// il prefisso 'prefix' ci permette di aggiungere un prefisso a tutte le rotte definite all'interno di questo gruppo
// localhost/dashboard/tutto quello che mettiamo nella rotta

// il prefisso 'name' ci permette di assegnare un nome specifico a ogni rotta all'interno di
// questo gruppo (ES. utile quando usiamo le rotte con elementi dell'interfaccia utente come
// le card,) con il nome di base 'dashboard.informazione POST / CREATE / CREATE ecc'
Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {

    // localhost:8000/dashboard/projects
    Route::resource('projects', ProjectController::class);

    // scriviamo il primo parametro 'projects' che sarebbe il pezzo dell'URL che auto generiamo, NomeController::class;

    // per ogni voce della card c'è una rotta
    // GET|HEAD    dashboard/projects .................. dashboard.projects.index › ProjectController@index
    // POST        dashboard/projects .................. dashboard.projects.store › ProjectController@store
    // GET|HEAD    dashboard/projects/create ........... dashboard.projects.create › ProjectController@create
    // GET|HEAD    dashboard/projects/{project} .......... dashboard.projects.show › ProjectController@show
    // PUT|PATCH   dashboard/projects/{project} .......... dashboard.projects.update › ProjectController@update
    // DELETE      dashboard/projects/{project} .......... dashboard.projects.destroy › ProjectController@destroy
    // GET|HEAD    dashboard/projects/{project}/edit ..... dashboard.projects.edit › ProjectController@edit
});

require __DIR__.'/auth.php';
