<?php

namespace Core\View;

class View
{
    public static function render($templateName, array $data)
    {
        extract($data);

        ob_start();

        require_once "../templates/{$templateName}.html.php";

        $content = ob_get_clean();

        if(!isset($pageTitle)){ $pageTitle = "pas de titre"; }

        ob_start();
        require_once "../templates/base.html.php";

        echo ob_get_clean();
    }
}