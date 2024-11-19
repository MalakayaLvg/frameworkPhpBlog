<?php

namespace Core\Session;

class Session
{
    public static function start()
    {
        if (session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
    }

    public static function get($index)
    {
        if(isset($_SESSION[$index])){
            return $_SESSION[$index];
        }
        else{return false;}
    }

    public static function userConnected():bool
    {
        if (Session::get("user"))
        {
            return true;
        }
        return false;
    }

    public static function set($index,$value)
    {
        $_SESSION[$index] = $value;
    }
}