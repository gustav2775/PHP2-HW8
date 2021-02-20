<?php

namespace app\model\entities;


use app\model\Model;

class Basket extends Model
{
    protected $id;
    protected $id_session;
    protected $id_user;
    protected $id_product;
    protected $quantity;
    protected $name_product;
    protected $price;
    protected $imgProd;
    protected $views;
    protected $description;


    protected $prop = [
        'id_session' => false,
        'id_product' => false,
        'quantity' => false,
    ];

    public function __construct($id_session = null, $id_product = null, $quantity = null)
    {
        if (!is_null($id_session)) {
            $this->id_session = $id_session;
            $this->prop['id_session'] = true;
        }
        if (!is_null($id_product)) {
            $this->id_product = $id_product;
            $this->prop['id_product'] = true;
        }
        if (!is_null($quantity)) {
            $this->quantity = $quantity;
            $this->prop['quantity'] = true;
        }
    }
}
