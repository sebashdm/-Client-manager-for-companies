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
		
                    $files=$request->getUploadedFiles();
                    $logo = $files['logo'];

                    if($logo->getError() == UPLOAD_ERR_OK)
                    	{
                    		$fileName = $logo->getClientFilename();
                    		$logo->moveTo("uploads/$fileName");
                    	}

					$product = new Product();
					$product->productname = $postData["txt_productName"];
					$product->filename=$fileName;
					$product->Save();
					$responseMessage = 'Producto Guardado Correctamente';
                    
            
             

         
			}

		 return $this->renderHTML('addProduct.twig',[
		 	'responseMessage' => $responseMessage
		 ]);

	}
	
}