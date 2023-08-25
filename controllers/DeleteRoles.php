<?php

class DeleteRoles extends Controller {

    public $roles;
   
    public function index()
    {    
     $model = $this->model('Role');
     $this->roles = $model->findAll();
     $this->view('rolesForm', ['viewName' => 'Delete role', 'rolesAction' => 'Delete']);
    }
}
?>