<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Tenemos que importar el archivo al inicio

use App\Note;

Route::get('/', function () {
    return view('welcome');
});

Route::get('notes', 'NotesController@index');			// Ver Notas (Pagina Principal)

Route::get('notes/create', 'NotesController@create');	// Crear Notas

Route::post('notes', 'NotesController@store');			// Enviar Notas a grabación

// Rutas Dinámicas: Si tenemos muchas notas, no debemos crear una ruta para cada nota, solo definimos una ruta utilizando un párámetro dinámico, el cual se representa entre {}, como: {note}
// Podemos crear parametros opcionales, usando ?, como: {slug?}
// Con el método where restringimos que haya cadenas de texto en nuestra ruta

Route::get('notes/{note}', 'NotesController@show')->where('note', '[0-9]+');		// Listar Notas
