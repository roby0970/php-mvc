<?php

class CreateRoles extends Controller {

    public $roles;
   
    public function index()
    {    
        $this->view('addOrEditRole', ['viewName' => 'Add role', 'action' => '/CreateRoles/create']);
    }

    public function create() {
        $roles = $this->model('Role');
        var_dump($_POST);
        if (isset($_POST['formName'])) {
            $roles->insert($_POST['formName']);
            header('location: /Roles');
        } else {
            header('location: /Roles');
        }
    }
}
?>