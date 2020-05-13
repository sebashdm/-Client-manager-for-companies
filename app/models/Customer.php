<?php

namespace app\models;
use Illuminate\Database\Eloquent\Model;	

 class Customer extends Model  {
 	protected $table = 'cliente'; //Nombre de la tabla tal cual esta en la base de datos
	 
	protected $fillable = ['nombre', 'tipo','email','telefono','cupo','imagen'];

 }