<?php

class Controller
{

  function __construct()
  {
    // Session::int();
  }

  public function model($model)
  {
       require_once('Model.php');
       require_once(__DIR__ .'/../models/' . $model . '.php');
       return new $model();
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
}