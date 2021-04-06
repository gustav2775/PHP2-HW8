<?php


namespace app\model;

abstract class Model 
{
    public function __set($name, $value)
    {
        if (array_key_exists($name, $this->prop)) {
            $this->prop[$name] = true;
        }
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __isset($name)
    {
        return isset ($name);
    }
}
