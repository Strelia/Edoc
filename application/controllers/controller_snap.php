<?php

class Controller_Snap extends Controller
{

    function action_index()
    {
        $req = DBUtil::connectDB()->query("SELECT * FROM snaps");
        $list = array();
        $row = 0;
        if ($req->num_rows > 0) {
            while ($res = $req->fetch_assoc()) {
                $list[$row++] = $res;
            }
        }
        DBUtil::closeDB();
        $this->view->generate('snap/snaps_view.php', 'template_view.php', $list);
    }

    function action_add()
    {
        $this->view->generate('snap/snap_view.php', 'template_view.php');
    }

    function action_del()
    {
        if (isset($_POST["id"])) {
            DBUtil::connectDB()->query("DELETE FROM snaps WHERE id = " . $_POST["id"]);
        }
        header('Location:/snap/');
    }

    function action_edit()
    {
        $cell = null;
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $req = DBUtil::connectDB()->query("SELECT * FROM snaps WHERE id = '$id'");
            if ($req->num_rows > 0) {
                $cell = $req->fetch_assoc();
            }
            DBUtil::closeDB();
        }
        $this->view->generate('snap/snap_view.php', 'template_view.php', $cell);
    }

    function action_save()
    {
        if (isset($_POST["id"])) {
            if (empty($_POST["id"])) {
                $sql = "INSERT INTO snaps VALUES (NULL ,'" .
                    $_POST["name_entity_providing_admin_services"] . "', '" .
                    $_POST["name_admin_services"] . "')";
            } else {
                $sql = "UPDATE snaps SET name_entity_providing_admin_services='" . $_POST["name_entity_providing_admin_services"] . "', name_admin_services = '" . $_POST["name_admin_services"] . "' WHERE id =  " . $_POST["id"];
            }
            DBUtil::connectDB()->query($sql);
        }
        header('Location:/snap/');
    }
}
