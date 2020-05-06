<?php

namespace app\Controllers;

use app\models\user;
use Respect\Validation\Validator;
use Laminas\Diactoros\Response\RedirectResponse; //paquete que me ayuda a redireccionar al inciar sesion

class AuthController extends BaseController
{
	
	public function getLogin(){
           
	return $this->renderHTML('login.php');
       	      
	}


    public function getLogout(){
       unset($_SESSION['documento']);
       return new RedirectResponse('login');
       	      
	}


	public function postLogin($request){

          $postData = $request->getParsedBody();
	      $user = user::where('email',$postData['txt_email'])->first();
          if($user){
            if( password_verify($postData['txt_password'] , $user->contrasena)){
                $_SESSION['documento'] = $user->documento;
                return new RedirectResponse('/ClientManager');
                
                
            }else{
                $responseMessage = 'El password o correo no coinciden'; 
            }
          }else{
                    $responseMessage = 'El correo no existe'; 
          }

          	return $this->renderHTML('login.php',[
          		'responseMessage' => $responseMessage
          	]);



		  
	}
	
}