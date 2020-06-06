<?php


namespace app\Controllers;
use app\models\product;
use app\models\user;



class IndexController extends BaseController 
{
	public function indexAction(){
		

		$products = product::all(); //Aca se realiza la consulta a la bd y me trae todos los registros que hay en product.
	
		return $this->renderHTML('index.php',[
			'products' => $products
			
		]);
	}
}