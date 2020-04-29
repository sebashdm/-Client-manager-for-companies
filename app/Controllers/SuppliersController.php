<?php

namespace app\Controllers;
use app\models\Supplier;
use Respect\Validation\Validator;


 class SuppliersController  extends BaseController
{
	
	public function getAddSupplierAction($request)
	{

        $responseMessage = null;
			
			if(  $request->getMethod() == 'POST'){


            $postData = $request->getParsedBody();
			$SupplierValidator = 

			Validator::key('txt_supplierName', Validator::stringType()->notEmpty());
			

             try {
	                $SupplierValidator->assert($postData);

                    $files=$request->getUploadedFiles();
                    $logo = $files['logo'];

                    if($logo->getError() == UPLOAD_ERR_OK)
                    	{
                    		$fileName = $logo->getClientFilename();
                    		$logo->moveTo("uploads/$fileName");
                    	}

					$supplier = new Supplier();
					$supplier->productName = $postData["txt_supplierName"];
					$supplier->fileName=$fileName;
					$supplier->Save();
					$responseMessage = 'Proveedor Guardado Correctamente';
                    
            
             } catch(\Exception $e){
                   $responseMessage ="NO ENVIAR DATOS VACIOS";

             }

         
			}

		 return $this->renderHTML('addSupplier.twig',[
		 	'responseMessage' => $responseMessage
		 ]);
		
	}
}