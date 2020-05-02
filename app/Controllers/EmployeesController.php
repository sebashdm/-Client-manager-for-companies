<?php

namespace app\Controllers; // uso de namespace para evitar el uso de los include

use app\models\Employee; // Se llama el modelo empleado
use Respect\Validation\Validator; // Librearia para hacer validaciones

class EmployeesController extends BaseController
{
	
	public function getAddEmployeeAction($request){
          
          $responseMessage = null;
			
			if(  $request->getMethod() == 'POST'){


                    $postData = $request->getParsedBody();
		
                    $files=$request->getUploadedFiles();
                    $logo = $files['logo'];
                    $document = $files['documento'];

                    if($logo->getError() == UPLOAD_ERR_OK)
                    	{
                    		$fileName = $logo->getClientFilename();
                    		$logo->moveTo("uploads/$fileName");
                        }

                     if($document->getError() == UPLOAD_ERR_OK)
                    	{
                    		$fileNameDocument = $document->getClientFilename();
                    		$document->moveTo("documents/$fileNameDocument");
                        }
                        

                    // Creacion de objeto empleado e ingreso de datos a la bd
					$employee = new Employee();
                    $employee->name = $postData["txt_name"];
                    $employee->salary = $postData["txt_salary"];
                    $employee->deductions = $postData["txt_deductions"];
                    $employee->filename=$fileName;
                    $employee->filenamedocument=$fileNameDocument;
                    $employee->email = $postData["txt_email"];
                    $employee->phone = $postData["txt_phone"];
                    $employee->movilphone = $postData["txt_movilphone"];
					$employee->Save();
					$responseMessage = 'Producto Guardado Correctamente';
			}

		 return $this->renderHTML('addCustomer.twig',[
		 	'responseMessage' => $responseMessage
		 ]);

	}
	
}