<?php

namespace app\model\repositories;

use app\model\Repository;

class OrdersRepository extends Repository
{
  public  function getTableName()
  {
    return 'orders';
  }
  
  public function getProduct($order)
  {
    return  json_decode($order->products, true);
  }
}
