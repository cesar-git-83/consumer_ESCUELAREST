<?php namespace App\Controllers\API;

use App\Models\ProfesorModel;
use CodeIgniter\RESTful\ResourceController;

class Profesor extends ResourceController
{
    public function __constuct(){
        $this->model= $this-> setModel(new ProfesorModel());


    }

	public function index()
	{
        $profesor = $this->model->findAll();
		return $this->respond($profesor);
	}

	
}