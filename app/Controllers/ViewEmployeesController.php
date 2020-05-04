<?php

namespace app\Controllers;
use app\models\Employee;



class ViewEmployeesController extends BaseController 
{
	public function ViewEmployeesAction(){
		

		$Employees = Employee::all(); //Aca se realiza la consulta a la bd y me trae todos los registros que hay en product.
	
		return $this->renderHTML('viewEmployees.twig',[
			'Employees' => $Employees
			
		]);
	}
}