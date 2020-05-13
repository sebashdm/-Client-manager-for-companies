<?php

namespace app\models;
use Illuminate\Database\Eloquent\Model;	


class Supplier extends Model {
 	
	 protected $table = 'proveedor';
	 
	 protected $fillable = ['nombre', 'tipo','email','telefono','imagen'];

}