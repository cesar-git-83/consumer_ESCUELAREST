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

	
}