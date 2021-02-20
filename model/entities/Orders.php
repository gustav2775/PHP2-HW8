<?php

namespace app\model\entities;

use app\model\Model;

class Orders extends Model
{
    protected $id;
    protected $id_user;
    protected $products;
    protected $sum_order;
    protected $user_name;
    protected $number;
    protected $email;
    protected $adress;
    protected $status;

    protected $prop = [
        'id_user' => false,
        'products' => false,
        'sum_order' => false,
        'user_name' => false,
        'number' => false,
        'email' => false,
        'adress' => false,
        'status' => false
    ];


    public function __construct($id_user = null, $products = null, $sum_order = null)
    {
        if (!is_null($id_user)) {
            $this->id_user = $id_user;
            $this->prop['id_user'] = true;
        }
        if (!is_null($products)) {
            $this->products = $products;
            $this->prop['products'] = true;
        }
        if (!is_null($sum_order)) {
            $this->sum_order = $sum_order;
            $this->prop['sum_order'] = true;
        }
    }
}
