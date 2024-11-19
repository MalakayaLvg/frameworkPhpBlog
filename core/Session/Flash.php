<?php

namespace Core\Session;

use Core\Session\Session;

class Flash
{
    public static function addMessage(string $message, string $color)
    {
        $flashMessage = [
            "message"=>$message,
            "color"=>$color
        ];

        $flashMessages = Session::get("flashMessages");
        if(!$flashMessages){$flashMessages = [] ; }

        $flashMessage[] = $flashMessage;

        Session::set("flashMessages", $flashMessages);

    }

    public static function clearMessages()
    {
        Session::set("flashMessages",[]);
    }

    public static function getFlashes()
    {
        $messages = \Core\Session\Session::get("flashesMessages");
        Flash::clearMessages();
        return $messages;

    }
}