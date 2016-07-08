<?php

class Controller_Main extends Controller
{

    function action_index()
    {
        $req = DBUtil::connectDB()->query("SELECT * FROM register_admin_services");
        $list = array();
        if ($req->num_rows > 0) {
            foreach ($req->fetch_assoc() as $key => $value) {
                if ($key == "rda_id" || $key == "snap_id") {
                    $reqInner = DBUtil::connectDB()->query("SELECT * FROM " . substr($key, 0, strpos($key, "_")) . "s");
                    $resInner = array();
                    foreach ($reqInner->fetch_assoc() as $key => $value) {
                        if ($key != "id") {
                            $resInner[$key] = $value;
                        }
                    }
                    $list = array_merge($list, $resInner);
                }
                $list[$key] = $value;
            }
        }
        DBUtil::closeDB();
        $this->view->generate('register_admin_service/register_admin_services_view.php', 'template_view.php', $list);
    }

    function action_add()
    {
        $this->view->generate('register_admin_service/register_admin_service_view.php', 'template_view.php');
    }

    function action_del()
    {
        if (isset($_POST["id"])) {
            DBUtil::connectDB()->query("DELETE FROM register_admin_services WHERE id = " . $_POST["id"]);
        }
        header('Location:/');
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
        $this->view->generate('register_admin_service/register_admin_service_view.php', 'template_view.php', $cell);
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
        header('Location:/');
    }
}