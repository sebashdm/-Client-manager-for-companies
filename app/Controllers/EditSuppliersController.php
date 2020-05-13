<?php

namespace app\Controllers;

use app\models\Supplier;
use Respect\Validation\Validator;

class EditSuppliersController extends BaseController
{
	
	

    public function edit(){
		 $idSupplier = $_POST['Supplierid'];
		 $Suppliers = Supplier::findOrFail($idSupplier);
		 
		 return $this->renderHTML('editSupplier.twig',[
			'Suppliers' => $Suppliers
		]);
	}


}