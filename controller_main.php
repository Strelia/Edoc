<?php


class Controller_Main extends Controller

{


    function action_index()
    {
        $sql = "";
        $flag = false;

        if (isset($_POST["id_st_f"]) && !empty($_POST["id_st_f"]) && isset($_POST["id_fin_f"]) && !empty($_POST["id_fin_f"])) {
            $sql .= " register_admin_services.id BETWEEN " . $_POST["id_st_f"] . " AND " . $_POST["id_fin_f"] . " AND ";
            $flag = true;
        } elseif (isset($_POST["id_st_f"]) && !empty($_POST["id_st_f"])) {
            $sql .= " register_admin_services.id >= " . $_POST["id_st_f"] . " AND ";
            $flag = true;
        } elseif (isset($_POST["id_fin_f"]) && !empty($_POST["id_fin_f"])) {
            $sql .= " register_admin_services.id <= " . $_POST["id_fin_f"] . " AND ";
            $flag = true;
        }

        if (isset($_POST["date_package_doc_RDA_st_f"]) && !empty($_POST["date_package_doc_RDA_st_f"]) && isset($_POST["date_package_doc_RDA_fin_f"]) && !empty($_POST["date_package_doc_RDA_fin_f"])) {
            $sql .= " date_package_doc_RDA BETWEEN " . $_POST["date_package_doc_RDA_st_f"] . " AND " . $_POST["date_package_doc_RDA_fin_f"] . " AND ";
            $flag = true;
        } elseif (isset($_POST["date_package_doc_RDA_st_f"]) && !empty($_POST["date_package_doc_RDA_st_f"])) {
            $sql .= " date_package_doc_RDA >= " . $_POST["date_package_doc_RDA_st_f"] . " AND ";
            $flag = true;
        } elseif (isset($_POST["date_package_doc_RDA_fin_f"]) && !empty($_POST["date_package_doc_RDA_fin_f"])) {
            $sql .= " date_package_doc_RDA <= " . $_POST["date_package_doc_RDA_fin_f"] . " AND ";
            $flag = true;
        }

        if (isset($_POST["reg_num_doc_f"]) && !empty($_POST["reg_num_doc_f"])) {
            $sql .= " reg_num_doc LIKE '%" . $_POST["reg_num_doc_f"] . "%' AND ";
            $flag = true;
        }

        if (isset($_POST["correspondent_f"]) && !empty($_POST["correspondent_f"])) {
            $sql .= " correspondent LIKE '%" . $_POST["correspondent_f"] . "%' AND ";
            $flag = true;
        }

        if (isset($_POST["name_rda_f"]) && !empty($_POST["name_rda_f"])) {
            $sql .= " name_rda LIKE '%" . $_POST["name_rda_f"] . "%' AND ";
            $flag = true;
        }

        if (isset($_POST["snap_id_f"]) && !empty($_POST["snap_id_f"])) {
            $sql .= " snap_id = " . $_POST["snap_id_f"] . " AND ";
            $flag = true;
        }

        if (isset($_POST["date_transmission_doc_snap_st_f"]) && !empty($_POST["date_transmission_doc_snap_st_f"]) && isset($_POST["date_transmission_doc_snap_fin_f"]) && !empty($_POST["date_transmission_doc_snap_fin_f"])) {
            $sql .= " date_transmission_doc_snap BETWEEN " . $_POST["date_transmission_doc_snap_st_f"] . " AND " . $_POST["date_transmission_doc_snap_fin_f"] . " AND ";
            $flag = true;
        } elseif (isset($_POST["date_transmission_doc_snap_st_f"]) && !empty($_POST["date_transmission_doc_snap_st_f"])) {
            $sql .= " date_transmission_doc_snap >= " . $_POST["date_transmission_doc_snap_st_f"] . " AND ";
            $flag = true;
        } elseif (isset($_POST["date_transmission_doc_snap_fin_f"]) && !empty($_POST["date_transmission_doc_snap_fin_f"])) {
            $sql .= " date_transmission_doc_snap <= " . $_POST["date_transmission_doc_snap_fin_f"] . " AND ";
            $flag = true;
        }

        if (isset($_POST["snap_name_receiv_doc_f"]) && !empty($_POST["snap_name_receiv_doc_f"])) {
            $sql .= " snap_name_receiv_doc LIKE '%" . $_POST["snap_name_receiv_doc_f"] . "%' AND ";
            $flag = true;
        }

        if (isset($_POST["deadline_st_f"]) && !empty($_POST["deadline_st_f"]) && isset($_POST["deadline_fin_f"]) && !empty($_POST["deadline_fin_f"])) {
            $sql .= " deadline BETWEEN " . $_POST["deadline_st_f"] . " AND " . $_POST["deadline_fin_f"] . " AND ";
            $flag = true;
        } elseif (isset($_POST["deadline_st_f"]) && !empty($_POST["deadline_st_f"])) {
            $sql .= " deadline >= " . $_POST["deadline_st_f"] . " AND ";
            $flag = true;
        } elseif (isset($_POST["deadline_fin_f"]) && !empty($_POST["deadline_fin_f"])) {
            $sql .= " deadline <= " . $_POST["deadline_fin_f"] . " AND ";
            $flag = true;
        }

        if (isset($_POST["returning_res_admin_services_snap_st_f"]) && !empty($_POST["returning_res_admin_services_snap_st_f"]) && isset($_POST["returning_res_admin_services_snap_fin_f"]) && !empty($_POST["returning_res_admin_services_snap_fin_f"])) {
            $sql .= " returning_res_admin_services_snap BETWEEN " . $_POST["returning_res_admin_services_snap_st_f"] . " AND " . $_POST["returning_res_admin_services_snap_fin_f"] . " AND ";
            $flag = true;
        } elseif (isset($_POST["returning_res_admin_services_snap_st_f"]) && !empty($_POST["returning_res_admin_services_snap_st_f"])) {
            $sql .= " returning_res_admin_services_snap >= " . $_POST["returning_res_admin_services_snap_st_f"] . " AND ";
            $flag = true;
        } elseif (isset($_POST["returning_res_admin_services_snap_fin_f"]) && !empty($_POST["returning_res_admin_services_snap_fin_f"])) {
            $sql .= " returning_res_admin_services_snap <= " . $_POST["returning_res_admin_services_snap_fin_f"] . " AND ";
            $flag = true;
        }

        if (isset($_POST["date_representatives_rda_doc_st_f"]) && !empty($_POST["date_representatives_rda_doc_st_f"]) && isset($_POST["date_representatives_rda_doc_fn_f"]) && !empty($_POST["date_representatives_rda_doc_fn_f"])) {
            $sql .= " date_representatives_rda_doc BETWEEN " . $_POST["date_representatives_rda_doc_st_f"] . " AND " . $_POST["date_representatives_rda_doc_fn_f"] . " AND ";
            $flag = true;
        } elseif (isset($_POST["date_representatives_rda_doc_st_f"]) && !empty($_POST["date_representatives_rda_doc_st_f"])) {
            $sql .= " date_representatives_rda_doc >= " . $_POST["date_representatives_rda_doc_st_f"] . " AND ";
            $flag = true;
        } elseif (isset($_POST["date_representatives_rda_doc_fn_f"]) && !empty($_POST["date_representatives_rda_doc_fn_f"])) {
            $sql .= " date_representatives_rda_doc <= " . $_POST["date_representatives_rda_doc_fn_f"] . " AND ";
            $flag = true;
        }

        if (isset($_POST["recipient_name_doc_f"]) && !empty($_POST["recipient_name_doc_f"])) {
            $sql .= " recipient_name_doc LIKE '%" . $_POST["recipient_name_doc_f"] . "%' AND ";
            $flag = true;
        }

        if (isset($_POST["note_f"]) && !empty($_POST["note_f"])) {
            $sql .= " note LIKE '%" . $_POST["note_f"] . "%' AND ";
            $flag = true;
        }


        $flagCheck = false;
        if (isset($_POST["status_f"]) && !empty($_POST["status_f"])) {

            $sql .= "(";

            foreach ($_POST["status_f"] as $val){
                $sql .= "status = $val OR ";
            }

            $sql = substr ( $sql , 0, strlen($sql)-4);
            $sql .= ")";
            $flagCheck = true;
            $flag = true;
        }

       $sql = $flagCheck? $sql: substr($sql,0,strlen($sql)-5);


        if ($flag) {
            $sql = " WHERE " . $sql;
        }

        $sql = "SELECT register_admin_services.id, date_package_doc_RDA, reg_num_doc, name_rda, email, correspondent, name_entity_providing_admin_services, snaps.name_admin_services, date_transmission_doc_snap, snap_name_receiv_doc, deadline, returning_res_admin_services_snap, date_representatives_rda_doc, recipient_name_doc, note, status FROM register_admin_services INNER JOIN rdas ON  register_admin_services.rda_id = rdas.id INNER JOIN snaps ON register_admin_services.snap_id = snaps.id" . $sql;


        $req = DBUtil::connectDB()->query($sql);
        $list = array();
        $rows = 0;
        if ($req->num_rows > 0) {
            while ($res = $req->fetch_assoc()) {
                $list[$rows++] = $res;
            }
        }

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

                $status = $_POST["status"] + 1;

                $sqlAdd = "NULL, NULL, NULL";

                if (!empty($_POST["recipient_name_doc"]) && !empty($_POST["date_representatives_rda_doc"]) && !empty($_POST["returning_res_admin_services_snap"])) {

                    $status = 3;

                    $sqlAdd = "'" . $_POST["recipient_name_doc"] . "', '" . $_POST["date_representatives_rda_doc"] . "', '" . $_POST["returning_res_admin_services_snap"] . "'";

                } elseif (!empty($_POST["returning_res_admin_services_snap"]) && !empty($_POST["date_representatives_rda_doc"])) {

                    $status = 2;

                    $sqlAdd = "'" . $_POST["returning_res_admin_services_snap"] . "', '" . $_POST["date_representatives_rda_doc"] . "'";

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

                $sqlAdd = "', date_representatives_rda_doc = NULL, recipient_name_doc = NULL";

                $status = $_POST["status"] + 1;

                if (!empty($_POST["date_representatives_rda_doc"]) && !empty($_POST["recipient_name_doc"])) {

                    $sqlAdd = "', date_representatives_rda_doc = '" . $_POST["date_representatives_rda_doc"] . "', recipient_name_doc = '" . $_POST["recipient_name_doc"] . "'";

                    $status = 3;

                }

                $sql = "UPDATE register_admin_services SET returning_res_admin_services_snap='" .

                    $_POST["returning_res_admin_services_snap"] . $sqlAdd . "', note = '" .

                    $_POST["note"] . "', status = '" .

                    $status . "' WHERE id =  " . $_POST["id"];

            }

            DBUtil::connectDB()->query($sql);

        }

        header('Location:/');

    }

}