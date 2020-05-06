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
		
                    $files=$request->getUploadedFiles();
                    $logo = $files['logo'];

                    if($logo->getError() == UPLOAD_ERR_OK)
                    	{
                    		$fileName = $logo->getClientFilename();
                    		$logo->moveTo("uploads/$fileName");
                    	}

					$supplier = new Supplier();
					$supplier->documento = $postData["txt_cedula"];
					$supplier->nombre = $postData["txt_supplierName"];
					$supplier->tipo = $postData["txt_supplierType"];
					$supplier->imagen = $fileName;
					$supplier->email = $postData["txt_email"];
					$supplier->telefono = $postData["txt_telefono"];
					$supplier->Save();
					$responseMessage = 'Proveedor Guardado Correctamente';
            

         
			}

		 return $this->renderHTML('addSupplier.twig',[
		 	'responseMessage' => $responseMessage
		 ]);
		
	}
}