<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("saludo", fn()=> "Hola mundo");


Route::get("saludo", function () {
    return "Hola mundo";
});

Route::get("saludo", fn()=> view ("saludo"));
//Route::get("main", fn()=> view ("main"));
Route::get("main", [MainController::class, "index"]);

Route::fallback(function (){
    $nombre = request()->path();

return "<h1>Esta ruta <span style='color: red'>$nombre</span> no existe</h1>";
});

