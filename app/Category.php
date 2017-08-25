<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Para la Categoria debemos especificar que "una categoria (Category) tiene muchas notas (Note)"

	public function notes()
	{
	   return $this->hasMany(Note::class);
	}


}
