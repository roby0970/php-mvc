<?php

class EditUsers extends Controller {

    public $user;
    protected function permission()
    {
        return 'editUsers';
    }
    public function index()
    {    
        $this->requestAccess();
        $userId = basename($_SERVER['REQUEST_URI']);
        $model = $this->model('User');
        $this->user = $model->findSingle($userId);
        if ($this->user == false) {
            $this->goHome();
        }

        $rolesModel = $this->model('Role');
        $this->roles = $rolesModel->findAll();
       
        $this->view('addOrEditUser', ['viewName' => 'Edit user', 'action' => '/EditUsers/edit','rolePicker' => $this->roles, 'userData' => $this->user]);
    }            

    public function edit() {
        $users = $this->model('User');
        if (isset($_POST['userId']) && isset($_POST['formUsername']) && isset($_POST['formEmail']) && isset($_POST['formPassword'])) {
            if ($_POST['formRole'] == "-1") {
                $selectedRole = NULL;
            } else {
                $selectedRole = $_POST['formRole'];
            }
            $hashpw = password_hash($_POST['formPassword'], PASSWORD_DEFAULT);
            $users->update($_POST['userId'], $_POST['formEmail'], $_POST['formUsername'], $selectedRole,  $hashpw, $_POST['formPassword']);
            

            if ($_SESSION['id'] == $_POST['userId']) {
                Session::set('username', $_POST['formUsername']);
                Session::set('role', $selectedRole);
                $accessToActions = $this->model('RolePermission')->getRolePermissions($selectedRole);
                Session::set('permission', $accessToActions);
            }
            
            header('location: /Users');
        } else {
            header('location: /Users');
        }
    }
}
?>