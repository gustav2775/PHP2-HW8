<?php


namespace app\engine;


class Request
{
    protected $requestString;
    protected $controllerName;
    protected $actionName;

    protected $params;
    protected $method;


    public function __construct()
    {
        $this->parseRequest();
    }

    private function parseRequest() {
        $requestString = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $url = explode('/', $requestString);
        
        $this->controllerName = $url[1];
        $this->actionName = $url[2];
        $this->params = $_REQUEST;

        $data = json_decode(file_get_contents('php://input'));
        if (!is_null($data)) {
            foreach ($data as $key => $value) {
                $this->params[$key] = $value;
            }
        }
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getMethod()
    {
        return $this->method;
    }
}