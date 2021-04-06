<?php

namespace app\engine ;

use app\interfaces\IRender;
use app\engine\App;

class DefaultRender implements IRender

{
    public function renderVeiws($template, $params = [])
    {
        ob_start();
        extract($params);
        $templatePath = dirname(__DIR__) . "/views/". $template . '.php';
        if (file_exists($templatePath)) {
            include $templatePath;
        }
        return ob_get_clean();
    }

    
}
