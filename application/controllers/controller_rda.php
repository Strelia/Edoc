<?php

class Controller_Rda extends Controller
{

    function action_index()
    {
        $req = DBUtil::connectDB()->query("SELECT * FROM rdas");
        $list = array();
        $row = 0;
        if ($req->num_rows > 0) {
            while ($res = $req->fetch_assoc()) {
                $list[$row++] = $res;
            }
        }
        DBUtil::closeDB();
        $this->view->generate('rda/rdas_view.php', 'template_view.php', $list);
    }

    function action_add()
    {
        $this->view->generate('rda/rda_view.php', 'template_view.php');
    }

    function action_del()
    {
        if (isset($_POST["id"])) {
            $req = DBUtil::connectDB()->query("DELETE FROM rdas WHERE id = " . $_POST["id"]);
        }
        header('Location:/rda/');
    }

    function action_edit()
    {
        $cell = null;
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $req = DBUtil::connectDB()->query("SELECT * FROM rdas WHERE id = '$id'");
            if ($req->num_rows > 0) {
                $cell = $req->fetch_assoc();
            }
            DBUtil::closeDB();
        }
        $this->view->generate('rda/rda_view.php', 'template_view.php', $cell);
    }

    function action_save()
    {
        if (isset($_POST["id"])) {
            if (empty($_POST["id"])) {
                $sql = "INSERT INTO rdas VALUES (NULL ,'" . $_POST["name_rda"] . "','" .
                    $_POST["name_admin_services"] . "','" . $_POST["email"] . "')";
            } else {
                $sql = "UPDATE rdas SET name_rda='" . $_POST["name_rda"] . "', name_admin_services = '" . $_POST["name_admin_services"] . "'," .
                    "email = '" . $_POST["email"] . "' WHERE id = " . $_POST["id"];
            }
            DBUtil::connectDB()->query($sql);
        }
        header('Location:/rda/');
    }
}
