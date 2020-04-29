<?php

namespace app\Controllers;
use app\models\product;



class IndexController extends BaseController 
{
	public function indexAction(){
		

		$products = product::all();
	
		return $this->renderHTML('index.twig',[
			'products' => $products
			
		]);
	}
}