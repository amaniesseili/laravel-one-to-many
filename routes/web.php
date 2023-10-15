<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProjectController as GuestProjectController; // lo importo aggiungendo as .. per nn avere problemi dello stesso nome con admin 
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('guests.welcome');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//creo le rotte per le mie CRUD:------------------------

//Ragruppo le rotte aggiungendo il middleware per assicurare che queste rotte admin siano accessibili solo agli utenti loggati

Route::middleware(['auth', 'verified'])
    ->prefix('admin')  // per non inserire /admin in ogni rotta
    ->name('admin.')   //per nn inserire admin.(...admin.projects.index)
    ->group(function () {




        //CREATE
        //per il modulo di creazione di un nuovo progetto
        Route::get("/projects/create", [ProjectController::class, "create"])->name("projects.create");

        //per salvare un nuovo progetto nel data base
        Route::post("/projects", [ProjectController::class, "store"])->name("projects.store");

        //READ
        //per l'elenco dei progetti
        Route::get("/projects", [ProjectController::class, "index"])->name("projects.index");

        //per la visualizzazione dei dettagli di un progetto
        Route::get("/projects/{project}", [ProjectController::class, "show"])->name("projects.show");

        // UPDATE
        Route::get("/projects/{project}/edit", [projectController::class, "edit"])->name("projects.edit"); //mostra il form dove possiamo modificare il nostro contenuto
        Route::patch("/projects/{project}", [projectController::class, "update"])->name("projects.update"); // riceve i dati del form edit e li salva 

        // DELETE
        Route::delete("/projects/{project}", [projectController::class, "destroy"])->name("projects.destroy");
    });

// Route::get("admin/projects/create", function(){
//     return "ciao";
// });
//------------------------------------------------------
//rotta per il guest controller-----------------------
Route::get("/projects", [GuestProjectController::class, "index"])->name("projects.index");
//----------------------------------------------------

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProjectsController::class, 'edit'])->name('admin.profile.edit');
    
    Route::patch('/admin/profile', [ProjectsController::class, 'update'])->name('admin.profile.update');

    Route::delete('/admin/profile', [ProjectsController::class, 'destroy'])->name('admin.profile.destroy');
});

require __DIR__ . '/auth.php';
