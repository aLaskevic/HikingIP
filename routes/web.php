<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


#Leitfaden zu Namenskonvention
#index  - Großer Überblick über die Daten
#show   - zeigt Daten von einer speziellen Ressource z.B einer Station
#create - Formular um x zu erstellen
#store  - Post request um x zu speichern
#edit   - Formular um x zu ändern
#update - Patch request um x zu ändern
#remove - Formular um x zu löschen
#delete - Delete um x zu löschen 
#


#Start Route
Route::get('/', [App\Http\Controllers\HomeController::class, 'landing'])->name('home');

#Admin Routes
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);

#Admin-Map Routes
Route::get('/admin/map', [App\Http\Controllers\AdminMapController::class, 'list']);
Route::get('/admin/map/routename', [App\Http\Controllers\AdminMapController::class, 'orderbyname']);
Route::get('/admin/map/location', [App\Http\Controllers\AdminMapController::class, 'orderbylocation']);
Route::get('/admin/map/creator', [App\Http\Controllers\AdminMapController::class, 'orderbycreator']);
Route::get('/admin/map/create', [App\Http\Controllers\AdminMapController::class, 'create']);
Route::get('/admin/map/{map}', [App\Http\Controllers\AdminMapController::class, 'show']);
Route::patch('/admin/map/{map}/publish', [App\Http\Controllers\AdminMapController::class, 'publish']);
Route::patch('/admin/map/{map}/hide', [App\Http\Controllers\AdminMapController::class, 'hide']);
Route::get('/admin/map/{map}/editname', [App\Http\Controllers\AdminMapController::class, 'editname']);
Route::patch('/admin/map/{map}/editname', [App\Http\Controllers\AdminMapController::class, 'updatename']);
Route::get('/admin/map/{map}/editlocation', [App\Http\Controllers\AdminMapController::class, 'editlocation']);
Route::patch('/admin/map/{map}/editlocation', [App\Http\Controllers\AdminMapController::class, 'updatelocation']);
Route::get('/admin/map/{map}/editimage', [App\Http\Controllers\AdminMapController::class, 'editimage']);
Route::patch('/admin/map/{map}/editimage', [App\Http\Controllers\AdminMapController::class, 'updateimage']);
Route::get('/admin/map/{map}/editlength', [App\Http\Controllers\AdminMapController::class, 'editlength']);
Route::patch('/admin/map/{map}/editlength', [App\Http\Controllers\AdminMapController::class, 'updatelength']);
Route::get('/admin/map/{map}/editdescription', [App\Http\Controllers\AdminMapController::class, 'editdescription']);
Route::patch('/admin/map/{map}/editdescription', [App\Http\Controllers\AdminMapController::class, 'updatedescription']);
Route::get('/admin/map/{map}/editgmap', [App\Http\Controllers\AdminMapController::class, 'editgmap']);
Route::patch('/admin/map/{map}/editgmap', [App\Http\Controllers\AdminMapController::class, 'updategmap']);
Route::get('/admin/map/{map}/delete', [App\Http\Controllers\AdminMapController::class, 'deletemap']);
Route::delete('/admin/map/{map}/delete', [App\Http\Controllers\AdminMapController::class, 'removemap']);
Route::post('/admin/map/create', [App\Http\Controllers\AdminMapController::class, 'store']);
Route::get('/admin/map/{map}/bingo', [App\Http\Controllers\BingoController::class, 'index']);

#Admin Station
Route::get('/admin/map/{map}/station', [App\Http\Controllers\StationController::class, 'index']);
Route::get('/admin/map/{map}/station/create', [App\Http\Controllers\StationController::class, 'create']);
Route::post('/admin/map/{map}/station/create', [App\Http\Controllers\StationController::class, 'store']);
Route::get('/admin/map/{map}/station/{station}', [App\Http\Controllers\StationController::class, 'show']);
Route::get('/admin/map/{map}/station/{station}/editname', [App\Http\Controllers\StationController::class, 'editname']);
Route::patch('/admin/map/{map}/station/{station}/editname', [App\Http\Controllers\StationController::class, 'updatename']);
Route::get('/admin/map/{map}/station/{station}/editimage', [App\Http\Controllers\StationController::class, 'editimage']);
Route::patch('/admin/map/{map}/station/{station}/editimage', [App\Http\Controllers\StationController::class, 'updateimage']);
Route::get('/admin/map/{map}/station/{station}/delete', [App\Http\Controllers\StationController::class, 'delete']);
Route::delete('/admin/map/{map}/station/{station}/delete', [App\Http\Controllers\StationController::class, 'remove']);

#Admin-Tales
Route::get('/admin/map/{map}/station/{station}/tale/create', [App\Http\Controllers\TaleController::class, 'create']);
Route::post('/admin/map/{map}/station/{station}/tale/create', [App\Http\Controllers\TaleController::class, 'store']);
Route::get('/admin/map/{map}/station/{station}/edittitle', [App\Http\Controllers\TaleController::class, 'edittitle']);
Route::patch('/admin/map/{map}/station/{station}/edittitle', [App\Http\Controllers\TaleController::class, 'updatetitle']);
Route::get('/admin/map/{map}/station/{station}/edittext', [App\Http\Controllers\TaleController::class, 'edittext']);
Route::patch('/admin/map/{map}/station/{station}/edittext', [App\Http\Controllers\TaleController::class, 'updatetext']);
Route::get('/admin/map/{map}/station/{station}/deletetale', [App\Http\Controllers\TaleController::class, 'remove']);
Route::delete('/admin/map/{map}/station/{station}/deletetale', [App\Http\Controllers\TaleController::class, 'delete']);

#Admin-Quiz-Questions
Route::get('/admin/map/{map}/station/{station}/quiz/create', [App\Http\Controllers\QuestionController::class, 'create']);
Route::post('/admin/map/{map}/station/{station}/quiz/create', [App\Http\Controllers\QuestionController::class, 'store']);
Route::get('/admin/map/{map}/station/{station}/quiz/{question}', [App\Http\Controllers\QuestionController::class, 'show']);
Route::get('/admin/map/{map}/station/{station}/quiz/{question}/editquestion', [App\Http\Controllers\QuestionController::class, 'editquestion']);
Route::patch('/admin/map/{map}/station/{station}/quiz/{question}/editquestion', [App\Http\Controllers\QuestionController::class, 'updatequestion']);
Route::get('/admin/map/{map}/station/{station}/quiz/{question}/editimage', [App\Http\Controllers\QuestionController::class, 'editimage']);
Route::patch('/admin/map/{map}/station/{station}/quiz/{question}/editimage', [App\Http\Controllers\QuestionController::class, 'updateimage']);
Route::get('/admin/map/{map}/station/{station}/quiz/{question}/delete', [App\Http\Controllers\QuestionController::class, 'remove']);
Route::delete('/admin/map/{map}/station/{station}/quiz/{question}/delete', [App\Http\Controllers\QuestionController::class, 'delete']);

#Admin-Quiz-Answers
Route::get('/admin/map/{map}/station/{station}/quiz/{question}/create', [App\Http\Controllers\AnswerController::class, 'create']);
Route::post('/admin/map/{map}/station/{station}/quiz/{question}/create', [App\Http\Controllers\AnswerController::class, 'store']);
Route::get('/admin/map/{map}/station/{station}/quiz/{question}/{answer}', [App\Http\Controllers\AnswerController::class, 'show']);
Route::get('/admin/map/{map}/station/{station}/quiz/{question}/{answer}/edit', [App\Http\Controllers\AnswerController::class, 'edit']);
Route::patch('/admin/map/{map}/station/{station}/quiz/{question}/{answer}/edit', [App\Http\Controllers\AnswerController::class, 'update']);
Route::get('/admin/map/{map}/station/{station}/quiz/{question}/{answer}/delete', [App\Http\Controllers\AnswerController::class, 'remove']);
Route::delete('/admin/map/{map}/station/{station}/quiz/{question}/{answer}/delete', [App\Http\Controllers\AnswerController::class, 'delete']);

#Admin-Bingo
Route::get('/admin/map/{map}/bingo', [App\Http\Controllers\AdminBingoController::class, 'index']);
Route::get('/admin/map/{map}/bingo/create', [App\Http\Controllers\AdminBingoController::class, 'create']);
Route::post('/admin/map/{map}/bingo/create', [App\Http\Controllers\AdminBingoController::class, 'store']);
Route::get('/admin/map/{map}/bingo/{bingo}', [App\Http\Controllers\AdminBingoController::class, 'view']);
Route::get('/admin/map/{map}/bingo/{bingo}/edit', [App\Http\Controllers\AdminBingoController::class, 'edit']);
Route::patch('/admin/map/{map}/bingo/{bingo}/edit', [App\Http\Controllers\AdminBingoController::class, 'update']);
Route::get('/admin/map/{map}/bingo/{bingo}/delete', [App\Http\Controllers\AdminBingoController::class, 'remove']);
Route::delete('/admin/map/{map}/bingo/{bingo}/delete', [App\Http\Controllers\AdminBingoController::class, 'delete']);

#Map Routes
Route::get('/maps', [App\Http\Controllers\MapController::class, 'index']);
Route::get('/maps/search', [App\Http\Controllers\MapController::class, 'search']);
Route::get('/maps/{map}', [App\Http\Controllers\MapController::class, 'show']);


#Hiking Routes
Route::get('/maps/{map}/offline', [App\Http\Controllers\HikeController::class, 'offline']);
Route::get('/maps/{map}/{currstation}', [App\Http\Controllers\HikeController::class, 'nextstation']);
Route::get('/maps/{map}/{currstation}/{question}', [App\Http\Controllers\HikeController::class, 'startquestion']);
Route::get('/maps/{map}/{currstation}/{question}/next', [App\Http\Controllers\HikeController::class, 'nextquestion']);
Route::post('/maps/{map}/{currstation}/{question}/result', [App\Http\Controllers\HikeController::class, 'result']);


#Profile Routes
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index']);
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit']);
Route::get('/profile/edit/password', [App\Http\Controllers\ProfileController::class, 'editpassword']);
Route::patch('/profile/edit/password', [App\Http\Controllers\ProfileController::class, 'updatepassword']);

#Testroute
Route::get('/hike', [App\Http\Controllers\HikeController::class, 'hike']);
Route::post('/hike', [App\Http\Controllers\HikeController::class, 'store']);
