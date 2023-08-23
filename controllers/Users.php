<?php

class Users extends Controller {

    public $users;
   
    public function index()
    {     
     $model = $this->model('User');
     $this->users = $model->findAll();
      $this->view('listUsers', ['viewName' => 'Users']);
    }
}
?>