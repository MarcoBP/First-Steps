<?php

namespace App\Http\Controllers;

use App\Note;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class NotesController extends Controller
{
	public function index()
	{
	   	// Usamos Eloquent para cargar todas las notas de la BD
		// $notes = \App\Note::all();
		$notes = \App\Note::paginate(20);

		// En la variable notes se cargan todas las notas previamente, para imprimirlas usariamos:
		// dd($notes);

		return view('notes/list', compact('notes'));
	}

	public function create()
	{
		return view('notes/create');
	}

	public function store()
	{
		//return "Creating a note";

		//return request()->only(['note']);		// Devuleve solo el campo 'note' en un arreglo

		$this->validate(request(), [
			'note' => ['required', 'max:200']
		]);


		$data = request()->all();			// Guardamos en $data los datos enviados por el usuario

		Note::create($data);				// Creamos la nota en la BD, con los campos definidos como $fillable en la clase Note.php, 									// para este caso solo el campo 'note'

		return redirect()->to('notes');		// Redireccionamos a la pagina 'notes'

	}

	public function show($note)
	{
		dd($note);
	}
}
