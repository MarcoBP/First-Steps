<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    // Creamos la propiedad fillable en la clase: 
    // Campos que permiten asignación masiva de datos Ejemplo:  protected $fillable = ['title','note'];
    protected $fillable = ['note'];

    
    // Creamos el método Category para indicar que "una Note pertenece a una Category"
    public function category()
	{
    	return $this->belongsTo(Category::class);
	}

}
