<?php


class Controller_Main extends Controller
{

    public function action_index()
    {
        $user = $_SESSION["user"];

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

        if ($user["role"] == "rda") {
            $sql .= "rda_id = " . $user["id"] . " AND ";
            $flag = true;
        } elseif (isset($_POST["name_rda_f"]) && !empty($_POST["name_rda_f"])) {
            $sql .= " name_rda LIKE '%" . $_POST["name_rda_f"] . "%' AND ";
            $flag = true;
        }

        if ($user["role"] == "snap") {
            $sql .= " register_admin_services.snap_id = " . $user["id"] . " AND ";
            $flag = true;
        } elseif (isset($_POST["snap_id_f"]) && !empty($_POST["snap_id_f"])) {
            $sql .= " register_admin_services.snap_id = " . $_POST["snap_id_f"] . " AND ";
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

            foreach ($_POST["status_f"] as $val) {
                $sql .= "status = $val OR ";
            }

            $sql = substr($sql, 0, strlen($sql) - 4);
            $sql .= ")";
            $flagCheck = true;
            $flag = true;
        }

        $sql = $flagCheck ? $sql : substr($sql, 0, strlen($sql) - 5);


        if ($flag) {
            $sql = " WHERE " . $sql;
        }

        $sql = "SELECT register_admin_services.id, date_package_doc_RDA, reg_num_doc, name_rda, rdas.email, send_file, correspondent, name_entity_providing_admin_services, snaps_service.name_admin_services, date_transmission_doc_snap, snap_name_receiv_doc, deadline, returning_res_admin_services_snap, date_representatives_rda_doc, recipient_name_doc, note, status FROM register_admin_services INNER JOIN rdas ON  register_admin_services.rda_id = rdas.id INNER JOIN snaps_service ON register_admin_services.snap_id = snaps_service.id INNER JOIN snaps ON snaps.id = snaps_service.snap_id" . $sql;


        echo $sql."<br>";

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
        $user = $_SESSION["user"];
        if ($user["role"] == "rda") {
            $this->view->generate('register_admin_service/register_admin_service_rda_view.php', 'template_view.php');
        } else {
            header('Location:/');
        }
    }


    function action_del()
    {
//        if (isset($_POST["id"])) {
//            DBUtil::connectDB()->query("DELETE FROM register_admin_services WHERE id = " . $_POST["id"]);
//        }
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

        $user = $_SESSION["user"];
        if ($user["role"] == "admin") {
            switch ($cell["status"]) {
                case 0:
                    $this->view->generate('register_admin_service/register_admin_service_st0_view.php', 'template_view.php', $cell);
                    break;
                case 2:
                    $this->view->generate('register_admin_service/register_admin_service_st1_view.php', 'template_view.php', $cell);
                    break;
                case 3:
                    $this->view->generate('register_admin_service/register_admin_service_st3_view.php', 'template_view.php', $cell);
                    break;
                default:
                    header('Location:/');
            }
        } elseif ($user["role"] == "snap" && $cell["status"] == 1) {
            $this->view->generate('register_admin_service/register_admin_service_snap_view.php', 'template_view.php', $cell);
        } else {
            header('Location:/');
        }
    }

    function action_save()
    {
        if (isset($_POST["id"])) {

            $dir = str_replace("\\", "/", __DIR__);

            $dir = str_replace("/application/controllers", "", $dir);

            if (empty($_POST["id"])) {

                $lat_filename = $this->renameFile($_FILES['send_file']['name']);
                $lat_filename = "R" . date("H-i_m-d-Y", time()) . "_" . $lat_filename;

                $uploadDir = $dir . '/resourse/';
                $uploadFile = $uploadDir . $lat_filename;

                move_uploaded_file($_FILES['send_file']['tmp_name'], $uploadFile);

                $sql = "INSERT INTO register_admin_services VALUES (NULL, NULL, '" .
                    $_POST["reg_num_doc"] . "', '" .
                    $_SESSION["user"]["id"] . "','" .
                    "/resourse/" . $lat_filename . "','" .
                    $_POST["correspondent"] . "', '" .
                    $_POST["snap_id"] . "', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0)";
            } else {
                $user = $_SESSION["user"];
                $status = DBUtil::connectDB()->query("SELECT status FROM register_admin_services WHERE id = '" . $_POST["id"] . "'")->fetch_assoc()["status"];
                if ($user["role"] == "snap") {
                    echo "HI!<br>";
                    if ($status == 1) {
                        echo "we are<br>";
                        $lat_filename = $this->renameFile($_FILES['send_file']['name']);
                        $lat_filename = "S" . date("H-i_m-d-Y", time()) . "_" . $lat_filename;
                        $uploadDir = $dir . '/resourse/';
                        $uploadFile = $uploadDir . $lat_filename;
                        echo "$lat_filename <br>";
                        move_uploaded_file($_FILES['send_file']['tmp_name'], $uploadFile);
                        $sql = "UPDATE register_admin_services SET 	get_file = '" . "/resourse/" . $lat_filename .
                            "', status = '3' WHERE id =  '" . $_POST["id"] . "'";
                    } else {
                        header('Location:/');
                    }
                } elseif ($user["role"] == "admin") {
                    if ($status == 0) {
                        $sql ="UPDATE register_admin_services SET " .
                            "date_package_doc_RDA = '" . $_POST["date_package_doc_RDA"] . "', " .
                            "date_transmission_doc_snap = '" . $_POST["date_transmission_doc_snap"] . "', " .
                            "snap_name_receiv_doc = '" . $_POST["snap_name_receiv_doc"] . "', " .
                            "deadline = '" . $_POST["deadline"] . "'," .
                            "note = '" . $_POST["note"] . "', status = '1' WHERE id = " . $_POST["id"];
                    } elseif ($status == 2) {
                        $sql ="UPDATE register_admin_services SET " .
                            "returning_res_admin_services_snap = '" . $_POST["returning_res_admin_services_snap"] . "', " .
                            "note = '" . $_POST["note"] . "' status = '2' WHERE id = " . $_POST["id"];
                    } elseif ($status == 3) {
                        $sql = "UPDATE register_admin_services SET " .
                            "date_representatives_rda_doc = '" . $_POST["date_representatives_rda_doc"] . "', " .
                            "recipient_name_doc = '" . $_POST["recipient_name_doc"] . "', " .
                            "note = '" . $_POST["note"] . "' status = '4' WHERE id = " . $_POST["id"];
                    } else {
                        header('Location:/');
                    }
                }
            }
            DBUtil::connectDB()->query($sql);
//            echo $sql;
//            $req = DBUtil::connectDB()->query("SELECT email FROM rdas WHERE id = (SELECT rda_id FROM register_admin_services  WHERE id =  " . $_POST["id"] . ")");
//            $this->sendMail("vetal.ss@mail.ru", $_POST["id"], 0);

        }
        header('Location:/');
    }

    private
    function renameFile($fileName)
    {
        $url_translit = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v',
            'г' => 'g', 'д' => 'd', 'е' => 'e',
            'ё' => 'yo', 'ж' => 'zh', 'з' => 'z',
            'и' => 'i', 'й' => 'j', 'к' => 'k',
            'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r',
            'с' => 's', 'т' => 't', 'у' => 'u',
            'ф' => 'f', 'х' => 'x', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shh',
            'ь' => '\'', 'ы' => 'y', 'ъ' => '\'\'',
            'э' => 'e\'', 'ю' => 'yu', 'я' => 'ya',
            'А' => 'A', 'Б' => 'B', 'В' => 'V',
            'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
            'Ё' => 'YO', 'Ж' => 'Zh', 'З' => 'Z',
            'И' => 'I', 'Й' => 'J', 'К' => 'K',
            'Л' => 'L', 'М' => 'M', 'Н' => 'N',
            'О' => 'O', 'П' => 'P', 'Р' => 'R',
            'С' => 'S', 'Т' => 'T', 'У' => 'U',
            'Ф' => 'F', 'Х' => 'X', 'Ц' => 'C',
            'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'SHH',
            'Ь' => '\'', 'Ы' => 'Y\'', 'Ъ' => '\'\'',
            'Э' => 'E\'', 'Ю' => 'YU', 'Я' => 'YA',
            ' ' => '_', '№' => ''
        );

        return strtr($_FILES['send_file']['name'], $url_translit);
    }


    private
    function sendMail($from, $name, $to, $message, $id, $status)
    {
        $subject = "Регістр електороного обміну";
        $headers = "From: " . $from . "\r\n" .
            "CC: $to";

        mail($to, $subject, $message, $headers);
    }
}