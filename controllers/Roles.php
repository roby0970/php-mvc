<?php

class Roles extends Controller
{
    public $roles;
    protected function permission()
    {
        return 'readRoles';
    }
    public function index()
    {
        $this->requestAccess();
        $this->roles = $this->model('Role')->findAll();
        $this->view('roles', ['viewName' => 'Roles', 'access' => array_map('mapToName', $_SESSION['permission'])]);
    }

    public function create() {
        $this->requestAccessFor('addRoles');
        if (isset($_POST['action']) && $_POST['action'] == "create") {
            $this->createAction(); 
        } else {
            $permissions = $this->model('Permission');
            $allPermissions = $permissions->findAll();
            $this->view('addOrEditRole', ['viewName' => 'Add role', 'action' => 'create', 'permissionsList' => $allPermissions]);
        }
    }
    public function createAction() {
        $roles = $this->model('Role');
        $permissions = $this->model('Permission')->findAll();
        $rolePermissions = $this->model('RolePermission');
        $selectedPermissionIds = array();
        foreach ($permissions as $perm) {
            if (isset($_POST[$perm->id])) {
                array_push($selectedPermissionIds, $perm);
            }
        }
        if (isset($_POST['formName'])) {
            $newRoleId = $roles->insert($_POST['formName']);
            $rolePermissions->setPermissionsForRole($selectedPermissionIds, $newRoleId);
            header('location: /Roles');
        } else {
            header('location: /Roles');
        }
    }
    public function edit() {
        $this->requestAccessFor('editRoles');
        if (isset($_POST['action']) && $_POST['action'] == "edit") {
            $this->editAction(); 
        } else {
            $roleId = basename($_SERVER['REQUEST_URI']);
            $model = $this->model('Role');
            $this->role = $model->findSingle($roleId);
            if ($this->role == false) {
                $this->goHome();
            }
            $permissions = $this->model('Permission');
            $allPermissions = $permissions->findAll();
            $rolePermissions = $this->model('RolePermission');
            $selectedPermissionsList = $rolePermissions->getRolePermissions($roleId);
            
            $this->view('addOrEditRole', ['viewName' => 'Edit role', 'action' => 'edit', 'roleId' => $this->role->id, 'roleName' => $this->role->name,'permissionsList' => $allPermissions, 'selectedPermissionsList' => $selectedPermissionsList]);
   
        }
    }
    public function editAction() {
        $roles = $this->model('Role');
        $permissions = $this->model('Permission')->findAll();
        $rolePermissions = $this->model('RolePermission');
        $selectedPermissionIds = array();
        foreach ($permissions as $perm) {
            if (isset($_POST[$perm->id])) {
                array_push($selectedPermissionIds, $perm);
            }
        }
        if (isset($_POST['roleId']) && isset($_POST['formName'])) {
            $roles->update($_POST['roleId'], $_POST['formName']);

            $rolePermissions->setPermissionsForRole($selectedPermissionIds, $_POST['roleId']);
            if ($_SESSION['role'] == $_POST['roleId']) {
                $accessToActions = $this->model('RolePermission')->getRolePermissions($_POST['roleId']);
                Session::set('permission', $accessToActions);
            }
            header('location: /Roles');
        } else {
            header('location: /Roles');
        }
    }
    public function delete() {
        $this->requestAccessFor('deleteRoles');
        if (isset($_POST['action']) && $_POST['action'] == "delete") {
            $this->deleteAction(); 
        } else {
            $this->requestAccess();
            $roleId = basename($_SERVER['REQUEST_URI']);
            $model = $this->model('Role');
            $this->role = $model->findSingle($roleId);
            if ($this->role == false) {
                $this->goHome();
            }
            $this->view('deleteRole', ['viewName' => 'Delete role', 'roleId' => $this->role->id, 'roleName' => $this->role->name]);
        }
    }
    public function deleteAction() {
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
                 header('location: /Roles');
            } catch (PDOException $e) {
                echo 'Failed due to: ' . $e;
            }

        } else {
            header('location: /Roles');
        }
    }
}
?>