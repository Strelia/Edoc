<?php

class Controller_Login extends Controller
{

    function action_index()
    {
        if (isset($_POST['login']) && !empty($_POST['login'])) {
            $login = $_POST['login'];
            $reqUser = DBUtil::connectDB()->query("SELECT * FROM users WHERE email = '$login'");
            $reqKey = DBUtil::connectDB()->query("SELECT * FROM passwords WHERE pass = '$login'");
            if ($reqUser->num_rows > 0 || $reqKey->num_rows > 0) {
                $data["login_status"] = "access_granted";
                session_start();
                if($reqUser->num_rows > 0){
                    $_SESSION['user'] = $reqUser->fetch_assoc();
                }else{
                    $_SESSION['user']["email"] = "null";
                    $_SESSION['user']["is_admin"] = false;
                }
                header('Location:/main/');
            } else {
                $data["login_status"] = "access_denied";
            }
        } else {
            $data["login_status"] = "";
        }

        $this->view->generate('login_view.php', 'clear_view.php', $data);
    }

}