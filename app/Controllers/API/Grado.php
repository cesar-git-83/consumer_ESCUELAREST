<?php namespace App\Controllers\API;

use App\Models\GradoModel;
use CodeIgniter\RESTful\ResourceController;

class Grado extends ResourceController
{
    public function __constuct(){
        $this->model= $this-> setModel(new GradoModel());


    }

	public function index()
	{
        $grado = $this->model->findAll();
		return $this->respond($grado);
    }
    public function create()
    {
        try {
            $grado = $this->request->getJSON();
            if($this->model->insert($grado)):
                $grado->id = $this->model->insertID();
                return $this->respondCreated($grado);
            else:
                return $this->failValidationError($this->model->validation->listErrors());
            endif;
        } catch (\Exception $e) {
           
            return $this->failserverError('Ha ocurrido un error en el servidor');
        }
    }

	
}