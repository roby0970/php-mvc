<?php

class ViewPages extends Controller {

    public $page;
    protected function permission()
    {
        return 'readPages';
    }
    public function index()
    {    
        $this->requestAccess();

        $pageId = basename($_SERVER['REQUEST_URI']);
        $model = $this->model('Page');
        $this->page = $model->findSingle($pageId);
        if ($this->page == false) {
            $this->goHome();
        }
        $id = $this->page->id;
        $file_path = "pages/$id.html";
        header('Content-Type: text/html');
                // Read and output the HTML file
        readfile($file_path);
    }         
}
?>