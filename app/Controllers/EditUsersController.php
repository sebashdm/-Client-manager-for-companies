<?php

namespace app\Controllers;

use app\models\user;
use Respect\Validation\Validator;

class EditUsersController extends BaseController
{
	
	

    public function edit(){
		 $idUser = $_POST['Userid'];
		 $users = user::findOrFail($idUser);
		 
		 return $this->renderHTML('editUser.twig',[
			'Users' => $users
		]);
	}


}