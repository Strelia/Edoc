<?php

class Controller_Main extends Controller
{

    function action_index()
    {
        $req = DBUtil::connectDB()->query("SELECT * FROM register_admin_services");
        $list = array();
        $rows = 0;
        if ($req->num_rows > 0) {
            while ($res = $req->fetch_assoc()) {
                foreach ($res as $key => $value) {
                    if ($key == "rda_id" || $key == "snap_id") {
                        $reqInner = DBUtil::connectDB()->query("SELECT * FROM " . substr($key, 0, strpos($key, "_")) . "s");
                        $resInner = array();
                        foreach ($reqInner->fetch_assoc() as $key => $value) {
                            if ($key != "id") {
                                $resInner[$key] = $value;
                            }
                        }
                        $list[$rows] = array_merge($list[$rows],$resInner);
                    }
                    $list[$rows][$key] = $value;
                }
//                $list[$row++] = $res;
                $rows++;
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
            $req = DBUtil::connectDB()->query("SELECT * FROM register_admin_services WHERE id = '$id'");
            if ($req->num_rows > 0) {
                $cell = $req->fetch_assoc();
            }
        }
        $this->view->generate('register_admin_service/register_admin_service_view.php', 'template_view.php', $cell);
    }

    function action_save()
    {
        if (isset($_POST["id"])) {
            if (empty($_POST["id"])) {
                $status = $_POST["status"]+1;
                $sqlAdd ="NULL, NULL, NULL";
                if (!empty($_POST["recipient_name_doc"]) && !empty($_POST["date_representatives_rda_doc"]) && !empty($_POST["returning_res_admin_services_snap"])){
                    $status = 3;
                    $sqlAdd = "'".$_POST["recipient_name_doc"] . "', '" .$_POST["date_representatives_rda_doc"] . "', '" .$_POST["returning_res_admin_services_snap"] . "'";
                }elseif (!empty($_POST["returning_res_admin_services_snap"]) && !empty($_POST["date_representatives_rda_doc"])){
                    $status = 2;
                    $sqlAdd = "'".$_POST["returning_res_admin_services_snap"] . "', '" .$_POST["date_representatives_rda_doc"]."'";
                }
                $sql = "INSERT INTO register_admin_services VALUES (NULL ,'" .
                    $_POST["date_package_doc_RDA"] . "', '" .
                    $_POST["reg_num_doc"] . "', '" .
                    $_POST["rda_id"] . "', '" .
                    $_POST["correspondent"] . "', '" .
                    $_POST["snap_id"] . "', '" .
                    $_POST["date_transmission_doc_snap"] . "', '" .
                    $_POST["snap_name_receiv_doc"] . "', '" .
                    $_POST["deadline"] . "', " .
                    $sqlAdd . ", '" .
                    $_POST["note"] . "', '" .
                    $status . "')";
            } else {
                $sqlAdd ="', date_representatives_rda_doc = NULL, recipient_name_doc = NULL";
                $status = $_POST["status"] +1 ;
                if (!empty($_POST["date_representatives_rda_doc"]) && !empty($_POST["recipient_name_doc"])){
                    $sqlAdd = "', date_representatives_rda_doc = '".$_POST["date_representatives_rda_doc"]."', recipient_name_doc = '".$_POST["recipient_name_doc"]."'";
                    $status = 3;
                }
                $sql = "UPDATE register_admin_services SET returning_res_admin_services_snap='" .
                    $_POST["returning_res_admin_services_snap"] . $sqlAdd. ", note = '" .
                    $_POST["note"]. "', status = '" .
                     $status."' WHERE id =  " . $_POST["id"];
            }

            echo $sql;
            DBUtil::connectDB()->query($sql);
        }
        header('Location:/');
    }
}