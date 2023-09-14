<?php

class Menus extends Controller
{

    public $menus;
    protected function permission()
    {
        return 'readMenus';
    }
    public function getMenus()
    {
        $this->requestAccess();
        $menus = $this->model('Menu')->findByUserId($_SESSION['id']);
        return $menus;
    }
}
?>