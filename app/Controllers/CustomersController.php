<?php

namespace app\Controllers;

use app\models\Customer;
use Respect\Validation\Validator;

class CustomersController extends BaseController
{
	
	public function getAddCustomerAction($request){
          
          $responseMessage = null;
			
			if(  $request->getMethod() == 'POST'){


                    $postData = $request->getParsedBody();
		
                    $files=$request->getUploadedFiles();
                    $logo = $files['logo'];

                    if($logo->getError() == UPLOAD_ERR_OK)
                    	{
                    		$fileName = $logo->getClientFilename();
                    		$logo->moveTo("uploads/$fileName");
                    	}
                    // Creacion de objeto cliente e ingreso de datos a la bd
					$Customer = new Customer();
					$Customer->nombre = $postData["txt_name"];
					$Customer->id = $postData["txt_dni"];
                    $Customer->tipo = $postData["txt_customerType"];
                    $Customer->imagen=$fileName;
                    $Customer->email = $postData["txt_email"];
                    $Customer->telefono = $postData["txt_phone"];
                    $Customer->cupo = $postData["txt_creditType"];
					$Customer->Save();
					$responseMessage = 'Cliente Guardado Correctamente';
			}

		 return $this->renderHTML('addCustomer.twig',[
		 	'responseMessage' => $responseMessage
		 ]);

	}


		
	public function getUpdateCustomerAction($request){
          
		$responseMessage = null;
		  
		  if(  $request->getMethod() == 'POST'){
			
			$postData = $request->getParsedBody();

			$files=$request->getUploadedFiles();
			$logo = $files['logo'];

			if($logo->getError() == UPLOAD_ERR_OK)
				{
					$fileName = $logo->getClientFilename();
					$logo->moveTo("uploads/$fileName");
				}
			 
			$CustomerU = Customer::find($postData["txt_dni"]);	
			$CustomerU->update([
			
				'nombre' => $postData["txt_name"],
				'tipo'  => $postData["txt_customerType"],
				'email' => $postData["txt_email"],
				'telefono' => $postData["txt_phone"],
				'cupo' => $postData["txt_creditType"],
				'imagen' => $fileName
				 
			]);
			$CustomerU->Save();
			
				  $responseMessage = 'Cliente Actualizado Correctamente';
		  }

	   return $this->renderHTML('editCustomer.twig',[
		   'responseMessage' => $responseMessage
	   ]);

  }



}