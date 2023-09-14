<?php

class Pages extends Controller
{
    public $pages;
    protected function permission()
    {
        return 'readPages';
    }
    public function index()
    {
        $this->requestAccess();
        $this->pages = $this->model('Page')->findAll($_SESSION['role']);
        $this->view('pages', ['viewName' => 'Pages', 'access' => array_map('mapToName', $_SESSION['permission'])]);
    }
    public function create() {
        $this->requestAccessFor('addPages');
        if (isset($_POST['action']) && $_POST['action'] == "create") {
            $this->createAction(); 
        } else {
            $allRoles = $this->model('Role')->findAll();
            $this->view('addOrEditPage', ['viewName' => 'Add page', 'action' => 'create', 'rolesList' => $allRoles]);
        }
    }
    public function createAction() {
        $pages = $this->model('Page');
        $roles = $this->model('Role')->findAll();
        $rolePages = $this->model('RolePages');
        
        $selectedRoleIds = array();
        foreach ($roles as $rol) {
            if (isset($_POST[$rol->id])) {
                array_push($selectedRoleIds, $rol);
            }
        }

        if (isset($_POST['formName'])) {
            $newPageId = $pages->insert($_POST['formName'], $_POST['formContent'], $_POST['imageLocation']);
            $rolePages->setRolesForPage($selectedRoleIds, $newPageId);
            
            $this->savePage($newPageId, $_POST['formName'], $_POST['formContent'], $_POST['imageLocation']);
            
            header('location: /Pages');
        } else {
            header('location: /Pages');
        }
    }
    public function edit() {
        $this->requestAccessFor('editPages');
        if (isset($_POST['action']) && $_POST['action'] == "edit") {
            $this->editAction(); 
        } else {
            $pageId = basename($_SERVER['REQUEST_URI']);
            $model = $this->model('Page');
            $this->page = $model->findSingle($pageId);
            if ($this->page == false) {
                $this->goHome();
            }
            $roles = $this->model('Role');
            $allRoles = $roles->findAll();
            $rolePages = $this->model('RolePages');
            $selectedRoleList = $rolePages->getRolePages($pageId);
            $this->view('addOrEditPage', ['viewName' => 'Edit page', 'action' => 'edit', 'pageId' => $this->page->id,'pageContent' => $this->page->description, 'imageLocation' => $this->page->picture_path, 'pageName' => $this->page->name,'rolesList' => $allRoles, 'selectedrolesList' => $selectedRoleList]);
    
        }
    }
    public function editAction() {
        $pages = $this->model('Page');
        $roles = $this->model('Role')->findAll();
        $rolePages = $this->model('RolePages');

        $selectedRoleIds = array();
        foreach ($roles as $rol) {
            if (isset($_POST[$rol->id])) {
                array_push($selectedRoleIds, $rol);
            }
        }

        if (isset($_POST['pageId']) && isset($_POST['formName'])) {
            $pages->update($_POST['pageId'], $_POST['formName'], $_POST['formContent'], $_POST['imageLocation']);
            $rolePages->setRolesForPage($selectedRoleIds, $_POST['pageId']);
            
            $this->updatePage($_POST['pageId'], $_POST['formName'], $_POST['formContent'], $_POST['imageLocation']);

            header('location: /Pages');
        } else {
            header('location: /Pages');
        }
    }
    public function delete() {
        $this->requestAccessFor('deletePages');
        if (isset($_POST['action']) && $_POST['action'] == "delete") {
            $this->deleteAction(); 
        } else {
            $this->requestAccess();
            $pageId = basename($_SERVER['REQUEST_URI']);
            $model = $this->model('Page');
            $this->page = $model->findSingle($pageId);
            if ($this->page == false) {
                $this->goHome();
            }
            $this->view('deletePage', ['viewName' => 'Delete page', 'pageId' => $this->page->id, 'pageName' => $this->page->name]);
        }
    }
    public function deleteAction() {
        $pages = $this->model('Page');
        if (isset($_POST['choice']) && $_POST['choice'] == 1) {
            try {
                $pages->delete($_POST['pageId']);
                $this->deleteFile($_POST['pageId']);
            } catch (PDOException $e) {
                echo 'Failed due to: ' . $e;
            }
            header('location: /Pages');
        } else {
            header('location: /Pages');
        }
    }


    public function savePage($id, $name, $description, $picture_path)
    {
        $html_page = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>$name</title>
        </head>
        <body>
            <h1>$name</h1>
            <p>$description</p>
            <img src='$picture_path' alt='Image'>
        </body>
        </html>
        ";
        
        $filename = "pages/$id.html";
        file_put_contents($filename, $html_page);
    }
    public function updatePage($id, $name, $description, $picture_path)
    {
        // Relative URL path to the file you want to delete
        $file_path = "pages/$id.html";
        
        // Check if the file exists before attempting to delete it
        if (file_exists($file_path)) {
            // Attempt to delete the file
            unlink($file_path);
        }

        $html_page = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>$name</title>
        </head>
        <body>
            <h1>$name</h1>
            <p>$description</p>
            <img src='$picture_path' alt='Image'>
        </body>
        </html>
        ";
        
        $filename = "pages/$id.html";
        file_put_contents($filename, $html_page);
    }
    public function deleteFile($id)
    {
        // Relative URL path to the file you want to delete
        $file_path = "pages/$id.html";
        
        // Check if the file exists before attempting to delete it
        if (file_exists($file_path)) {
            // Attempt to delete the file
            unlink($file_path);
        }
    }
}
?>