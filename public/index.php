<?php
require_once '../vendor/autoload.php';
session_start();
use app\engine\App;

$config = include '../config/config.php';
App::call()->run($config);