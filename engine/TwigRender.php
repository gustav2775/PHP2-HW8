<?php

namespace app\engine;

require_once '../vendor/autoload.php';

use app\interfaces\IRender;

class TwigRender implements IRender
{
    public $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../viewTwig/');

        $this->twig = new \Twig\Environment($loader, [
            'debug' => true
        ]);
    }
    public function renderVeiws($template, $params = [])
    {
        echo $this->twig->render($template . '.twig', $params);
    }
}
