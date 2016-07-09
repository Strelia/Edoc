<?php

class Controller_Key extends Controller
{

    function action_index()
    {
        $req = DBUtil::connectDB()->query("SELECT * FROM passwords");
        $list = array();
        if ($req->num_rows > 0) {
            $row = 0;
            while ($res = $req->fetch_assoc()) {
                $list[$row++] = $res;
            }
        }
        DBUtil::closeDB();
        $this->view->generate('key_view.php', 'template_view.php', $list);
    }

    function action_update()
    {
        DBUtil::connectDB()->query("TRUNCATE TABLE passwords");
        $pass = $this->generate_password(10);
        echo $pass;
        DBUtil::connectDB()->query("INSERT INTO passwords VALUES(NULL , '$pass')");
        header('Location:/key');
    }

    function generate_password($number)
    {
        $arr = array('a', 'b', 'c', 'd', 'e', 'f',
            'g', 'h', 'i', 'j', 'k', 'l',
            'm', 'n', 'o', 'p', 'r', 's',
            't', 'u', 'v', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F',
            'G', 'H', 'I', 'J', 'K', 'L',
            'M', 'N', 'O', 'P', 'R', 'S',
            'T', 'U', 'V', 'X', 'Y', 'Z',
            '1', '2', '3', '4', '5', '6',
            '7', '8', '9', '0', '.', ',',
            '(', ')','!', '?',
            '&', '^', '%', '@', '*', '$',
            '<', '>', '/', '|', '+', '-',
            '{', '}', '`', '~');
        // Генерируем пароль
        $pass = "";
        for ($i = 0; $i < $number; $i++) {
            // Вычисляем случайный индекс массива
            $index = rand(0, count($arr) - 1);
            $pass .= $arr[$index];
        }
        return $pass;
    }

}