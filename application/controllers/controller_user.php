<?php

class Controller_User extends Controller
{

    function action_index()
    {
        session_start();
        $req = DBUtil::connectDB()->query("SELECT * FROM users WHERE id <> " . $_SESSION["user"]["id"]);
        $list = array();
        $row = 0;
        if ($req->num_rows > 0) {
            while ($res = $req->fetch_assoc()) {
                $list[$row++] = $res;
            }
        }
        DBUtil::closeDB();
        $this->view->generate('user/users_view.php', 'template_view.php', $list);
    }

    function action_addUser()
    {
        $this->view->generate('user/user_view.php', 'template_view.php');
    }

    function action_deleteUser()
    {
        if (isset($_POST["id_user"])) {
            $req = DBUtil::connectDB()->query("DELETE FROM Users WHERE id_user = " . $_POST["id_user"]);
        }
        header('Location:/user/');
    }

    function action_editUser()
    {
        $user = null;
        if (isset($_POST["id_user"])) {
            $id_user = $_POST["id_user"];
            $req = DBUtil::connectDB()->query("SELECT * FROM Users WHERE id_user = '$id_user'");
            if ($req->num_rows > 0) {
                $user = $req->fetch_assoc();
            }
            DBUtil::closeDB();
        }
        $this->view->generate('user/user_view.php', 'template_view.php', $user);
    }

    function action_addOrEditUser()
    {
        if (isset($_POST["id_user"])) {
            $tel_user = "''";
            $mob_user = "''";

            if (!empty($_POST["tel_user"])) {
                $tel_user = "'+380" . $_POST["tel_user"] . "'";
            }
            if (!empty($_POST["mob_user"])) {
                $mob_user = "'+380" . $_POST["mob_user"] . "'";
            }

            if (empty($_POST["id_user"])) {

                $sql = "INSERT INTO Users VALUES (NULL ,'" . $_POST["full_name_user"] . "'," .
                    $tel_user . "," . $mob_user . ",'" . $_POST["address_user"] . "','" . $_POST["mail_user"] . "','" .
                    $_POST["pass_user"] . "','" . $_POST["role_user"] . "')";
            } else {
                $pass = "";
                if (!empty($_POST["pass_user"])) {
                    $pass = ", pass_user = '" . $_POST["pass_user"] . "'";
                }

                $sql = "UPDATE Users SET full_name_user='" . $_POST["full_name_user"] . "', tel_user =" . $tel_user . "," .
                    "mob_user = " . $mob_user . "," . "address_user = '" . $_POST["address_user"] . "'," .
                    "mail_user = '" . $_POST["mail_user"] . "'," . "role_user = '" . $_POST["role_user"] . "'" . $pass .
                    "WHERE id_user = " . $_POST["id_user"];

                echo $sql;
            }
            $req = DBUtil::connectDB()->query($sql);
        }
        header('Location:/user/');
    }
}
