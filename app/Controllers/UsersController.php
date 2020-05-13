<?php

namespace app\Controllers;

use app\models\user;
use Respect\Validation\Validator;

class UsersController extends BaseController
{
	
	public function getAddUsersAction($request){
          
          $responseMessage = null;
			
			if(  $request->getMethod() == 'POST'){


                    $postData = $request->getParsedBody();
			        $user = new user();
					$user->nombre = $postData["txt_nomUser"];
					$user->id = $postData["txt_cedula"];
					$user->email = $postData["txt_email"];
					$user->contrasena =password_hash($postData["txt_password"], PASSWORD_DEFAULT);
					$user->rol = $postData['txt_rol'];
					$user->Save();
					$responseMessage = 'Usuario Creado con Exito';
                   
			}

		 return $this->renderHTML('addUser.twig',[
		 	'responseMessage' => $responseMessage
		 ]);

	}
	
}