<?php

namespace app\Controllers;
use app\models\Supplier;



class ViewSuppliersController extends BaseController 
{
	public function ViewSuppliersAction(){
		

		$Suppliers = Supplier::all(); //Aca se realiza la consulta a la bd y me trae todos los registros que hay en product.
	
		return $this->renderHTML('viewSuppliers.twig',[
			'Suppliers' => $Suppliers
			
		]);
	}


	public function destroy(){
		$Supplierid = $_POST['Supplierid'];
		$Suppliers = Supplier::all();
		Supplier::destroy($Supplierid);
		header('location: http://localhost/ClientManager/Suppliers/');
	 }
}