<?php

class DeleteUsers extends Controller
{

    public $user;
    protected function permission()
    {
        return 'deleteUsers';
    }
    public function index()
    {
        $this->requestAccess();
        $userId = basename($_SERVER['REQUEST_URI']);
        $model = $this->model('User');
        $this->user = $model->findSingle($userId);
        if ($this->user == false) {
            $this->goHome();
        }
        $this->view('deleteUser', ['viewName' => 'Delete user', 'userId' => $this->user->id, 'userName' => $this->user->username]);
    }

    public function delete()
    {
        $users = $this->model('User');
        if (isset($_POST['choice']) && $_POST['choice'] == 1) {
            try {
                $users->delete($_POST['userId']);
                if($_SESSION['id'] == $_POST['userId']) {
                    header('location: /Login/logoutUSer');
                } else {
                    header('location: /Users');

                }
            } catch (PDOException $e) {
                echo 'Failed due to: ' . $e;
            }

        } else {
            header('location: /Users');
        }

    }
}
?>