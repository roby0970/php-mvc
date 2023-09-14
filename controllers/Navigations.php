<?php

class Navigations extends Controller
{
    public $navigations;

    protected function permission()
    {
        return 'readMenus';
    }

    public function index()
    {
        $this->requestAccess();
        $this->navigations = $this->model('Menu')->findByUserId($_SESSION['id']);

        $this->view('navigations', ['viewName' => 'Navigations', 'access' => array_map('mapToName', $_SESSION['permission'])]);
    }


    public function create() {
        $this->requestAccessFor('addMenus');
        if (isset($_POST['action']) && $_POST['action'] == "create") {
            $this->createAction(); 
        } else {
            $allMenus = $this->model('Menu')->findAll();
            $this->view('addOrEditMenu', ['viewName' => 'Add menu', 'action' => 'create', 'menusList' => $allMenus]);
        }
    }

    public function createAction() {
        $menus = $this->model('Menu');
        $roles = $this->model('Menu')->findAll();

        $selectedRoleIds = array();
        foreach ($roles as $rol) {
            if (isset($_POST[$rol->id])) {
                array_push($selectedRoleIds, $rol);
            }
        }
        if (sizeof($selectedRoleIds) > 0) 
        {

            //
            $text = sizeof($selectedRoleIds);
            $filePath = "file.txt";
            file_put_contents($filePath, $text);
            //
            $menus->setMenusForUser($selectedRoleIds, $_SESSION['id']);
            
            header('location: /Navigations');
        } else {
            header('location: /Navigations');
        }
    }

    public function delete() {
        $this->requestAccessFor('deleteMenus');

        if (isset($_POST['action']) && $_POST['action'] == "delete") {
            $this->deleteAction(); 
        } else {
            $pageId = basename($_SERVER['REQUEST_URI']);
            $model = $this->model('Menu');
            $this->page = $model->findSingle($pageId);
            if ($this->page == false) {
                $this->goHome();
            }
            $this->view('deleteMenu', ['viewName' => 'Delete menu', 'menuId' => $this->page->id, 'menuName' => $this->page->name]);
        }

    }
    public function deleteAction() {
        $pages = $this->model('Menu');
        if (isset($_POST['choice']) && $_POST['choice'] == 1) {
            try {
                $pages->delete($_POST['menuId'], $_SESSION['id']);
            } catch (PDOException $e) {
                echo 'Failed due to: ' . $e;
            }
            header('location: /Navigations');
        } else {
            header('location: /Navigations');
        }
    }
}
?>