<?php

class Controller
{
  function __construct()
  {
      Session::int();
  }
  protected function permission() {
    return '';
  }
  protected function model($model)
  {
       require_once('Model.php');
       require_once(__DIR__ .'/../models/' . $model . '.php');
       return new $model();
  }
  protected function requestAccess() {
    $permissionNeeded = $this->permission();
      if (isset($permissionNeeded)) {
          if (isset($_SESSION['permission']) && in_array(($permissionNeeded), array_map('mapToName', $this->model('RolePermission')->getRolePermissions($_SESSION['role'])))) {

          }
          else {
            $this->goHome();
          }
      } 
  }
  public function view($view, $data = [])
  {   
      //load the header 
      require_once (__DIR__ .'/../views/shared/header.php');

      //load the spesific view
      require_once (__DIR__ .'/../views/' . $view . '.php');

      //load the footer
      require_once (__DIR__ .'/../views/shared/footer.php');
  }
  public function goHome() {
    header('Location: /Home');
  }
}