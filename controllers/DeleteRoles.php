<?php

class DeleteRoles extends Controller
{

    public $role;
    protected function permission()
    {
        return 'deleteRoles';
    }
    public function index()
    {
        $this->requestAccess();
        $roleId = basename($_SERVER['REQUEST_URI']);
        $model = $this->model('Role');
        $this->role = $model->findSingle($roleId);
        if ($this->role == false) {
            $this->goHome();
        }
        $this->view('deleteRole', ['viewName' => 'Delete role', 'roleId' => $this->role->id, 'roleName' => $this->role->name]);
    }

    public function delete()
    {
        $roles = $this->model('Role');
        $users = $this->model('User');
        if (isset($_POST['choice']) && $_POST['choice'] == 1) {
            try {
                $roles->delete($_POST['roleId']);
                $users->unsetRole($_POST['roleId']);

                if ($_SESSION['role'] == $_POST['roleId']) {
                    Session::set('role', null);
                    Session::set('permission', null);
                }
                // header('location: /Roles');
            } catch (PDOException $e) {
                echo 'Failed due to: ' . $e;
            }

        } else {
            header('location: /Roles');
        }

    }
}
?>