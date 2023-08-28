<?php
function mapToName($elem) {
    return $elem->name;
}
class Roles extends Controller {
   
    public $roles;
    
    public function index()
    {    
      
     $model = $this->model('Role');
     $this->roles = $model->findAll();
     
     if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
        $accessToActions = array_map('mapToName', $this->model('RolePermission')->getRolePermissions($_SESSION['role']));
        $this->view('roles', ['viewName' => 'Roles', 'rolesAction' => 'View', 'access' => $accessToActions]);
     } else {
        header('Location: /Home');
     }
     
    
    }
    
}
?>