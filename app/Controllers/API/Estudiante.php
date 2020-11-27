<?php namespace App\Controllers\API;

use App\Models\EstudianteModel;
use CodeIgniter\RESTful\ResourceController;

class Estudiante extends ResourceController
{
    public function __constuct(){
        $this->model= $this-> setModel(new EstudianteModel());


    }

	public function index()
	{
        $estudiante = $this->model->findAll();
		return $this->respond($estudiante);
	}

	public function create()
    {
        try {
            $estudiante = $this->request->getJSON();
            if($this->model->insert($estudiante)):
                $estudiante->id = $this->model->insertID();
                return $this->respondCreated($estudiante);
            else:
                return $this->failValidationError($this->model->validation->listErrors());
            endif;
        } catch (\Exception $e) {
           
            return $this->failserverError('Ha ocurrido un error en el servidor');
        }
    }
}