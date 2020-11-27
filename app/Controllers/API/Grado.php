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

	
}