<?php
require_once '../vendor/autoload.php';

use app\engine\{App,Session};

Session::sessionStart();

$config = include '../config/config.php';
App::call()->run($config);