<?php

class Roles extends Controller {

    public $roles;
   
    public function index()
    {     
     $model = $this->model('Role');
     $this->roles = $model->findAll();
      $this->view('roles', ['viewName' => 'Roles']);
    }
}
?>