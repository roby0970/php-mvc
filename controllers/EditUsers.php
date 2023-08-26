<?php

class EditUsers extends Controller {

    public $user;
   
    public function index()
    {    
        $userId = basename($_SERVER['REQUEST_URI']);
        $model = $this->model('User');
        $this->user = $model->findSingle($userId);


        $rolesModel = $this->model('Role');
        $this->roles = $rolesModel->findAll();
       
        $this->view('addOrEditUser', ['viewName' => 'Edit user', 'action' => '/EditUsers/edit','rolePicker' => $this->roles, 'userData' => $this->user]);
    }            

    public function edit() {
        $users = $this->model('User');
        var_dump($_POST);
        if (isset($_POST['userId']) && isset($_POST['formUsername']) && isset($_POST['formEmail']) && isset($_POST['formPassword'])) {
            if ($_POST['formRole'] == "-1") {
                $selectedRole = NULL;
            } else {
                $selectedRole = $_POST['formRole'];
            }
            $hashpw = password_hash($_POST['formPassword'], PASSWORD_DEFAULT);
            $users->update($_POST['userId'], $_POST['formEmail'], $_POST['formUsername'], $selectedRole,  $hashpw, $_POST['formPassword']);
            // $users->update($_POST['roleId'], $_POST['formName']);
            header('location: /Users');
        } else {
            header('location: /Users');
        }
    }
}
?>