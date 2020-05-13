<?php

namespace app\Controllers;

use app\models\Customer;
use Respect\Validation\Validator;

class EditCustomersController extends BaseController
{
	
	

    public function edit(){
		 $idproducto = $_POST['Clienteid'];
		 $Customers = Customer::findOrFail($idproducto);
		 
		 return $this->renderHTML('editCustomer.twig',[
			'Customers' => $Customers
		]);
	}


}