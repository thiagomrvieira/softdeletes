<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/users', [UserController::class, 'index']);


Route::post('/v1/notes', [NotesController::class, 'create']);
Route::get('/v1/notes', [NotesController::class, 'allNotes']);
Route::delete('v1/notes/{id}', [NotesController::class, 'permanentDelete']); //this on first permanent delete models
Route::delete('v2/notes/{id}', [NotesController::class, 'softDelete']);
Route::get('v2/notes/withsoftdelete',[NotesController::class, 'notesWithSoftDelete']);
Route::get('v2/notes/softdeleted',[NotesController::class, 'softDeleted']);
Route::patch('/v1/notes/{id}',[NotesController::class, 'restore']);
Route::delete('v3/notes/{id}',[NotesController::class, 'permanentDeleteSoftDeleted']);


