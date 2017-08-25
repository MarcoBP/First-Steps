<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Note;

class NotesTest extends TestCase
{
    // Desactivamos la comprobacion CSRF del Middelware
    // use WithoutMiddleware;

    use DatabaseTransactions;

    public function test_notes_list()
    {
    	// Con Eloquent ERM, podemos incluir las notas en la tabla

    	// Having (Base o condiciones para hacer la prueba, en este caso tenemos 2 notas en la BD)
    	Note::create(['note' => 'My first note']);
    	Note::create(['note' => 'Second note']);

        // When, definimos las diferentes acciones que haría el usuario
        $this->visit('notes')
        	
        	// Then, donde agregamos todas las comprobaciones
        	->see('My first note')
        	->see('Second note');

        	// Se lee: Teniendo 2 notas, cuando el usuario visite la pagina de notas, entonces va a ver la primera nota y la segunda nota
    }

    public function test_create_note()
    {
        $this->visit('notes')
            ->click('Add a note')
            ->seePageIs('notes/create')
            ->see('Create a Note')
            ->type('A new note' , 'note')
            ->press('Create note')
            ->seePageIs('notes')
            ->see('A new note')
            ->seeInDatabase('notes', [
                'note' => 'A new note'
              ]);

        // Cuando visitemos la página "notes" y hagamos click sobre el enlace "Add a Note", vamos a ser llevado a una nueva página llamada "notes/create", donde vamos a ver un título llamado "Crete a Note" y alli en esa página vamos a escribir "A new note" en un campo llamado "note", luego al ser presionado el enlace "Create note" vamos a ser llevados de vuelta a la página "notes" y dentro de esta página vamos a ver el texto correspondiente a la nota que agregamos "A new note", y vamos a tener esta nota registrada en la base de datos (En la tabla "notes" el campo "note" va a contener la nota "A new note")


    }

}

