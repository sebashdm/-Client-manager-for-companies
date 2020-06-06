<?php

namespace app\Controllers;

use app\models\Employee;
use Respect\Validation\Validator;

class EditEmployeesController extends BaseController
{
	
	

    public function edit(){
		 $idEmployee = $_POST['Employeeid'];
		 $Employees = Employee::findOrFail($idEmployee);
		 
		 return $this->renderHTML('editEmployee.twig',[
			'Employees' => $Employees
		]);
	}


}