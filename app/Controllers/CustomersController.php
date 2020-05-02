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
                    $Customer->name = $postData["txt_name"];
                    $Customer->customerType = $postData["txt_customerType"];
                    $Customer->filename=$fileName;
                    $Customer->email = $postData["txt_email"];
                    $Customer->phone = $postData["txt_phone"];
                    $Customer->creditType = $postData["txt_creditType"];
					$Customer->Save();
					$responseMessage = 'Producto Guardado Correctamente';
			}

		 return $this->renderHTML('addCustomer.twig',[
		 	'responseMessage' => $responseMessage
		 ]);

	}
	
}