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
                    $picture = $files['picture'];
                    $curriculum = $files['curriculum'];

                    if($picture->getError() == UPLOAD_ERR_OK)
                    	{
                    		$fileName = $picture->getClientFilename();
                    		$picture->moveTo("uploads/$fileName");
                        }

                     if($curriculum->getError() == UPLOAD_ERR_OK)
                    	{
                    		$fileNameDocument = $curriculum->getClientFilename();
                    		$curriculum->moveTo("documents/$fileNameDocument");
                        }
                        

                    // Creacion de objeto empleado e ingreso de datos a la bd
					$employee = new Employee();
                    $employee->nombre = $postData["txt_name"];
                    $employee->id = $postData["txt_dni"];
                    $employee->salario_basico = $postData["txt_salary"];
                    $employee->deducion = $postData["txt_deductions"];
                    $employee->foto=$fileName;
                    $employee->hoja_vida=$fileNameDocument;
                    $employee->email = $postData["txt_email"];
                    $employee->telefono = $postData["txt_phone"];
                    $employee->celular = $postData["txt_movilphone"];
                    
					$employee->Save();
					$responseMessage = 'Empleado Guardado Correctamente';
			}

		 return $this->renderHTML('addEmployee.twig',[
		 	'responseMessage' => $responseMessage
		 ]);

  }
  
  public function getUpdateEmployeesAction($request){
          
		$responseMessage = null;
		  
		  if(  $request->getMethod() == 'POST'){
			$postData = $request->getParsedBody();
			$files=$request->getUploadedFiles();
      $picture = $files['picture'];
      $curriculum = $files['curriculum'];

			if($picture->getError() == UPLOAD_ERR_OK)
				{
					$fileName = $picture->getClientFilename();
					$picture->moveTo("uploads/$fileName");
				}
       
        if($curriculum->getError() == UPLOAD_ERR_OK)
				{
					$fileNameDocument = $curriculum->getClientFilename();
					$curriculum->moveTo("documents/$fileNameDocument");
        }
        
			$EmployeeUpdate = Employee::find($postData["txt_dni"]);	
			$EmployeeUpdate->update([
			
				'nombre' => $postData["txt_name"],
				'salario_basico'  => $postData["txt_salary"],
				'deducion' => $postData["txt_deductions"],
        'email' => $postData["txt_email"],
        'telefono' => $postData["txt_phone"],
        'celular' => $postData["txt_movilphone"],
        'foto' => $fileName,
        'hoja_vida' => $fileNameDocument
				 
			]);
			$EmployeeUpdate->Save();
			
				  $responseMessage = 'Empleado Actualizado Correctamente';
		  }

	   return $this->renderHTML('editCustomer.twig',[
		   'responseMessage' => $responseMessage
	   ]);

  }

	
}