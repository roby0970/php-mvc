<?php

class CreateRoles extends Controller
{

    public $roles;
    protected function permission()
    {
        return 'addRoles';
    }
    public function index()
    {
        $this->requestAccess();
        $permissions = $this->model('Permission');
        $allPermissions = $permissions->findAll();
        $this->view('addOrEditRole', ['viewName' => 'Add role', 'action' => '/CreateRoles/create', 'permissionsList' => $allPermissions]);
    }

    public function create()
    {
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
}
?>