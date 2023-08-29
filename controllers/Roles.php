<?php
// function mapToName($elem)
// {
//     return $elem->name;
// }
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

}
?>