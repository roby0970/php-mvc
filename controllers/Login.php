<?php

class Login extends Controller
{
    public function index()
    {
        $this->view('login', ['viewName' => 'Login']);
    }
    public function checkUser()
    {
        $model = $this->model('User');
        $user = $model->login($_POST['email'], $_POST['password']);
        if ($user != null) {
            $accessToActions = $this->model('RolePermission')->getRolePermissions($user->role_id);
            Session::set('username', $user->username);
            Session::set('role', $user->role_id);
            Session::set('permission', $accessToActions);
            Session::set('id', $user->id);
            header('location: /Home');
        } else {
            header('location: /Login');
        }
    }
    public function logoutUser()
    {
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        unset($_SESSION['id']);
        Session::destroy();
        header('location: /Home');
        Session::int();
    }
}