<?php

namespace app\engine;

use app\engine\{DefaultRender, TwigRender,Request,Session,Storege};

/**
 * Class App
 * @property Request $request
 * @property BasketRepository $basketRepository
 * @property UserRepository $usersRepository
 * @property ProductRepository $productRepository
 * @property Session $session
 * @property Db $db
 */

class App
{
    protected $config;
    protected $components;

    private static $instance = null;

    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * @return static
     */

    public static function call()
    {
        return static::getInstance();
    }

    public function createComponent($name)
    {
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];
            $class = $params['class'];
            if (class_exists($class)) {
                unset($params['class']);
                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }
        }
        die("Компонента {$name} не существует в конфигурации системы!");
    }

    public function __get($name)
    {
        return $this->components->get($name);
    }

    public function run($config)
    {
        $this->config = $config;
        $this->components = new Storege;
        // $this->session->sessionStart();
        $this->runController();
    }

    public function runController()
    {
        $controllerName = $this->request->getControllerName() ?: "index";
        $controllerClass = "app\\controllers\\" . ucfirst($controllerName) . "Controller";

        $actionName = $this->request->getActionName()  ?: $controllerName;
        $actionMethod = "action" . $actionName;

        if (class_exists($controllerClass)) {
            $controllerClass = new $controllerClass(new DefaultRender());
            if (method_exists($controllerClass, $actionMethod)) {
                $controllerClass->$actionMethod();
            } else {
                die("Такого action не существует");
            }
        } else {
            die("Такой страницы не существует");
        }
    }
}