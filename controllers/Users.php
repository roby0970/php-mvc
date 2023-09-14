<?php

class Users extends Controller
{
    public $users;
    protected function permission()
    {
        return 'readUsers';
    }
    public function index()
    {
        $this->requestAccess();
        $model = $this->model('User');
        $this->users = $model->findAll();
        $this->view('users', ['viewName' => 'Users', 'access' => array_map('mapToName', $_SESSION['permission'])]);
    }

    public function create() {
        $this->requestAccessFor('addUsers');
        if (isset($_POST['action']) && $_POST['action'] == "create") {
            $this->createAction(); 
        } else {
            $model = $this->model('Role');
            $this->users = $model->findAll();
            $this->view('addOrEditUser', ['viewName' => 'Add users', 'action' => 'create', 'rolePicker' => $this->users]);
        }
    }
    
    public function createAction() {
        $users = $this->model('User');
        if (isset($_POST['formUsername']) && isset($_POST['formEmail']) && isset($_POST['formPassword'])) {
            if ($_POST['formRole'] == "-1") {
                $selectedRole = NULL;
            } else {
                $selectedRole = $_POST['formRole'];
            }
            $hashpw = password_hash($_POST['formPassword'], PASSWORD_DEFAULT);
            $users->insert($_POST['formEmail'], $_POST['formUsername'], $selectedRole, $hashpw, $_POST['formPassword']);
            header('location: /Users');
        } else {
            header('location: /Users');
        }
    }
    public function edit() {
        $this->requestAccessFor('editUsers');
        if (isset($_POST['action']) && $_POST['action'] == "edit") {
            $this->editAction(); 
        } else {
            $userId = basename($_SERVER['REQUEST_URI']);
            $model = $this->model('User');
            $this->user = $model->findSingle($userId);
            if ($this->user == false) {
                $this->goHome();
            }
    
            $rolesModel = $this->model('Role');
            $this->roles = $rolesModel->findAll();
           
            $this->view('addOrEditUser', ['viewName' => 'Edit user', 'action' => 'edit','rolePicker' => $this->roles, 'userData' => $this->user]);
        }
    }
    public function editAction() {
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
    public function delete() {        
        $this->requestAccessFor('deleteUsers');
        if (isset($_POST['action']) && $_POST['action'] == "delete") {
            $this->deleteAction();
        } else {
            $userId = basename($_SERVER['REQUEST_URI']);
            $model = $this->model('User');
            $this->user = $model->findSingle($userId);
            if ($this->user == false) {
                $this->goHome();
            }
            $this->view('deleteUser', ['viewName' => 'Delete user', 'userId' => $this->user->id, 'userName' => $this->user->username]);
        }
    }
    private function deleteAction() {
        $users = $this->model('User');
        if (isset($_POST['choice']) && $_POST['choice'] == 1) {
            try {
                $users->delete($_POST['userId']);
                if($_SESSION['id'] == $_POST['userId']) {
                    header('location: /Login/logoutUSer');
                } else {
                    header('location: /Users');
                }
            } catch (PDOException $e) {
                echo 'Failed due to: ' . $e;
            }
        } else {
            header('location: /Users');
        }
    }

}
?>