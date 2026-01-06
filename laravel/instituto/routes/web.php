<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludo', function () {
    return "hola";
});

Route::view("/ver", "saludo");

Route::get("/main", [MainController::class, "index"]);

Route::fallback(function () {
    $ruta = request()->url();
    return "La ruta <b style='color: red'>$ruta</b> no existe";
});

Route::get("/alumnos/{id}", AlumnoController::class);

Route::view("about", "about")->name("about");
Route::view("noticias", "noticias")->name("noticias");
