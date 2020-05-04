<?php

namespace app\Controllers;
use app\models\Customer;



class ViewCustomersController extends BaseController 
{
	public function ViewCustomersAction(){
		

		$Customers = Customer::all(); //Aca se realiza la consulta a la bd y me trae todos los registros que hay en product.
	
		return $this->renderHTML('viewCustomers.twig',[
			'Customers' => $Customers
			
		]);
	}
}