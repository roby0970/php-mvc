<?php

class DeleteUsers extends Controller {

    public $user;
   
    public function index()
    {    
     $userId = basename($_SERVER['REQUEST_URI']);
     $model = $this->model('User');
     $this->user = $model->findSingle($userId);
     $this->view('deleteUser', ['viewName' => 'Delete user', 'userId' => $this->user->id, 'userName' => $this->user->username]);
    }

    public function delete() {
        $users = $this->model('User');
        if (isset($_POST['choice']) && $_POST['choice'] == 1) {
            try {
                $users->delete($_POST['userId']);
                header('location: /Users');
            } catch(PDOException $e) {
                echo 'Failed due to: ' . $e;
            }
            
        } else {
            header('location: /Users');
        }
        
    }
}
?>