<?php

namespace app\model\entities;

use app\model\Model;

class Gallery extends Model
{
    protected $id;
    protected $name;
    protected $size;
    protected $views;

    public function __construct($name = null, $size = null)
    {
        $this->name = $name;
        $this->size = $size;
    }
}
