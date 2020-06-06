<?php

namespace app\models;
use Illuminate\Database\Eloquent\Model;	

 class user extends Model  {
	 protected $table = 'usuario';
	 
	 protected $fillable = ['nombre', 'email','rol','contrasena'];

 
 }