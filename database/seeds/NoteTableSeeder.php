<?php

use App\Note;
use App\Category;
use Illuminate\Database\Seeder;

class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $categories = Category::all();

       // factory(Note::class)->times(100)->create();
       $notes = factory(Note::class)->times(100)->make();		// para crear los modelos

       // Asigna una categoria por random, y luego la almcena en la BD deoendiendo de la relación especificada en el método notes()

       foreach 	($notes as $note) {
       		// $categories->random()->notes()->save($note);  se reemplaza por:

       		$category = $categories->random();
       		
       		// Equivale a escribir:
       		// $note->category_id = $category->id
       		// $note->save()
       		$category->notes()->save($note);
       }
    }
}
