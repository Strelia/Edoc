<?php

class DBUtil
{
    private static $conn = null;



    public static function connectDB()
    {

        global $conn;
        if ($conn != null) {
            return $conn;
        }

        $serverName = "127.0.0.1";
        $username = "root";
        $password = "";
        $dataBase = "edoc";

        $conn = new mysqli($serverName, $username, $password, $dataBase);
        $conn->set_charset("utf8");
        if ($conn->connect_error) {
            return "Connection failed: " . $conn->connect_error;
        }
        return $conn;
    }

    /**
     * connectToDB constructor.
     */
    public function __construct()
    {
    }

    public static function closeDB()
    {
        global $conn;
        $conn->close();
    }

}