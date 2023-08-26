<?php

class EditRoles extends Controller {

    public $role;
   
    public function index()
    {    
        $roleId = basename($_SERVER['REQUEST_URI']);
        $model = $this->model('Role');
        $this->role = $model->findSingle($roleId);
        $this->view('addOrEditRole', ['viewName' => 'Edit role', 'action' => '/EditRoles/edit', 'roleId' => $this->role->id, 'roleName' => $this->role->name]);
    }            

    public function edit() {
        $roles = $this->model('Role');
        var_dump($_POST);
        if (isset($_POST['roleId']) && isset($_POST['formName'])) {
            $roles->update($_POST['roleId'], $_POST['formName']);
            header('location: /Roles');
        } else {
            header('location: /Roles');
        }
    }
}
?>