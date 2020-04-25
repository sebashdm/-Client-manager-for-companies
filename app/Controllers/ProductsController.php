<?php

namespace app\Controllers;

use app\models\Product;
use Respect\Validation\Validator;

class ProductsController extends BaseController
{
	
	public function getAddProductAction($request){
          
          $responseMessage = null;
			
			if(  $request->getMethod() == 'POST'){


            $postData = $request->getParsedBody();
			$ProductValidator = 

			Validator::key('txt_productName', Validator::stringType()->notEmpty());
			

             try {
	                $ProductValidator->assert($postData);

                    $files=$request->getUploadedFiles();
                    $logo = $files['logo'];

                    if($logo->getError() == UPLOAD_ERR_OK)
                    	{
                    		$fileName = $logo->getClientFilename();
                    		$logo->moveTo("uploads/$fileName");
                    	}

					$product = new Product();
					$product->productName = $postData["txt_productName"];
					$product->fileName=$fileName;
					$product->Save();
					$responseMessage = 'Producto Guardado Correctamente';
                    
            
             } catch(\Exception $e){
                   $responseMessage ="NO ENVIAR DATOS VACIOS";

             }

         
			}

		 return $this->renderHTML('addProduct.twig',[
		 	'responseMessage' => $responseMessage
		 ]);

	}
	
}