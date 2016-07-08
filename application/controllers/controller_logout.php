<?php

class Controller_LogOut extends Controller
{

    function action_index()
    {
        session_start();
        unset($_SESSION['user']);
        header('Location:/login/');
    }

}