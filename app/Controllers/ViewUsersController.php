<?php

namespace app\Controllers;
use app\models\user;



class ViewUsersController extends BaseController 
{
	public function ViewUsersAction(){
		

		$Users = user::all(); 
	
		return $this->renderHTML('viewUsers.twig',[
			'Users' => $Users
			
		]);
	}


	public function destroy(){
		$idproducto = $_POST['Clienteid'];
		$Customers = Customer::all();
		Customer::destroy($idproducto);
		header('location: http://localhost/ClientManager/Customers/');
	 }
}