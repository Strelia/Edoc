<?php

class Controller_Login extends Controller
{

    function action_index()
    {
        if (isset($_POST['login']) && !empty($_POST['login'])) {
            $login = $_POST['login'];
            echo $login."<br>";
            $reqAdm = DBUtil::connectDB()->query("SELECT * FROM users WHERE email = '$login'");
            $reqUse = DBUtil::connectDB()->query("SELECT id, email FROM rdas WHERE email = '$login'");
            $reqKey = DBUtil::connectDB()->query("SELECT * FROM passwords WHERE pass = '$login'");
            if ($reqAdm->num_rows > 0 || $reqUse->num_rows > 0 || $reqKey->num_rows > 0) {
                $data["login_status"] = "access_granted";
                session_start();
                if ($reqAdm->num_rows > 0) {
                    $_SESSION['user'] = $reqAdm->fetch_assoc();
                } else if ($reqUse->num_rows > 0) {
                    $_SESSION['user'] = $reqUse->fetch_assoc();
                    $_SESSION['user']["is_admin"] = false;
                } else {
                    $_SESSION['user']["id"] = "0";
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