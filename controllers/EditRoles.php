<?php

class EditRoles extends Controller {

    public $role;
   
    public function index()
    {    
        $roleId = basename($_SERVER['REQUEST_URI']);
        $model = $this->model('Role');
        $this->role = $model->findSingle($roleId);
        $permissions = $this->model('Permission');
        $allPermissions = $permissions->findAll();
        $rolePermissions = $this->model('RolePermission');
        $selectedPermissionsList = $rolePermissions->getRolePermissions($roleId);
        
        $this->view('addOrEditRole', ['viewName' => 'Edit role', 'action' => '/EditRoles/edit', 'roleId' => $this->role->id, 'roleName' => $this->role->name,'permissionsList' => $allPermissions, 'selectedPermissionsList' => $selectedPermissionsList]);
    }            

    public function edit() {
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
            header('location: /Roles');
        } else {
            header('location: /Roles');
        }
    }
}
?>