<?php

namespace app\models;
use Illuminate\Database\Eloquent\Model;	

 class Employee extends Model  {
 	protected $table = 'empleado';
 	
	protected $fillable = ['nombre', 'salario_basico','email','telefono','celular','foto','hoja_vida','deducion'];
 }