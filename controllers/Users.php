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
}
?>