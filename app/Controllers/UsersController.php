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
					$user->idrol = $postData['txt_rol'];
					$user->Save();
					$responseMessage = 'Usuario Creado con Exito';
                   
			}

		 return $this->renderHTML('addUser.twig',[
		 	'responseMessage' => $responseMessage
		 ]);

	}

    public function getUpdateUsersAction($request){
          
		$responseMessage = null;
		  
		  if(  $request->getMethod() == 'POST'){
			
			$postData = $request->getParsedBody();

			$UserUpdate = user::find($postData["txt_dni"]);	
			$UserUpdate->update([
			
				'nombre' => $postData["txt_name"],
				'email'  => $postData["txt_email"],
				'idrol' => $postData["txt_perfil"]
		
			]);
			$UserUpdate->Save();
			
				  $responseMessage = 'Usuario Actualizado Correctamente';
		  }

	   return $this->renderHTML('editUser.twig',[
		   'responseMessage' => $responseMessage
	   ]);

  }


	
}