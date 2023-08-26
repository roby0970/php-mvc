<?php

class CreateUsers extends Controller {

    public $users;
   
    public function index()
    {    
        $model = $this->model('Role');
        $this->roles = $model->findAll();
        $this->view('addOrEditUser', ['viewName' => 'Add user', 'action' => '/CreateUsers/create', 'rolePicker' => $this->roles]);
    }

    public function create() {
        $users = $this->model('User');
        if (isset($_POST['formUsername']) && isset($_POST['formEmail']) && isset($_POST['formPassword'])) {
            if ($_POST['formRole'] == "-1") {
                $selectedRole = NULL;
            } else {
                $selectedRole = $_POST['formRole'];
            }
            $hashpw = password_hash($_POST['formPassword'], PASSWORD_DEFAULT);
            $users->insert($_POST['formEmail'], $_POST['formUsername'], $selectedRole,  $hashpw, $_POST['formPassword']);
            header('location: /Users');
        } else {
            header('location: /Users');
        }
    }
}
?>