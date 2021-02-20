<?php

namespace app\model\entities;

use app\model\Model;

class Catalog extends Model
{
    protected $id;
    protected $name_product;
    protected $price;
    protected $img_prod;
    protected $views;
    protected $description;

    protected $prop = [
        'id' => false,
        'name_product' => false,
        'price' => false,
        'img_prod' => false,
        'views' => false,
        'description' => false
    ];


    public function __construct($name_product = null, $price = null, $description = null)
    {
        if (!is_null($name_product)) {
            $this->name_product = $name_product;
            $this->prop['name_product'] = true;
        }
        if (!is_null($price)) {
            $this->price = $price;
            $this->prop['price'] = true;
        }
        if (!is_null($description)) {
            $this->description = $description;
            $this->prop['description'] = true;
        }
    }
}
