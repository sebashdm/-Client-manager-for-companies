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
					$supplier->id = $postData["txt_cedula"];
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


	public function getUpdateSupplierAction($request){
          
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
			 
			$SupplierU = Supplier::find($postData["txt_cedula"]);	
			$SupplierU->update([
			
				'nombre' => $postData["txt_supplierName"],
				'tipo'  => $postData["txt_supplierType"],
				'email' => $postData["txt_email"],
				'telefono' => $postData["txt_telefono"],
				'imagen' => $fileName
				 
			]);
			$SupplierU->Save();
			
				  $responseMessage = 'Cliente Actualizado Correctamente';
		  }

	   return $this->renderHTML('editCustomer.twig',[
		   'responseMessage' => $responseMessage
	   ]);

  }





}