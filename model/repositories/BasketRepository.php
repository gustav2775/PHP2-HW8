<?php

namespace app\model\repositories;

use app\model\Repository;
use app\engine\App;

class BasketRepository extends Repository
{

    public function getTableName()
    {
        return 'basket';
    }

    public function getBasket()
    {
        $sql = "SELECT basket.id, basket.quantity , basket.id_product, basket.id_session, catalog.name_product, catalog.price, catalog.img_prod FROM basket, catalog WHERE basket.id_product = catalog.id AND basket.id_session =:id_session";
        $params[':id_session'] = session_id();
        return  App::call()->db->queryAll($sql, $params);
    }

    public function getOneProd($id_product)
    {
        $sql = "SELECT * FROM basket WHERE id_product=:id_product AND id_session =:id_session";
        $params[':id_product'] = $id_product;
        $params[':id_session'] = session_id();
        return  App::call()->db->queryOneObject($sql, $params,static::class);
    }

    public function getCount()
    {
        $sql = "SELECT COUNT(id) AS count FROM basket WHERE id_session =:id_session";
        $params[':id_session'] = session_id();
        return  App::call()->db->queryOne($sql, $params);
    }

    public function basketUp()
    {
        $sql = "UPDATE  `basket` SET `quantity`=`quantity` + 1 WHERE `id`=:id";
        $params[':id'] = $this->id;
        App::call()->db->execute($sql, $params);
    }

    public function deleteBasket()
    {
        $sql = "DELETE FROM `basket` WHERE `id_session` = :id_session";
        App::call()->db->execute($sql, [':id_session' => session_id()]);
    }

    public function basketRemove()
    {
        $sql = "UPDATE  `basket` SET `quantity`=`quantity` - 1 WHERE `id`=:id";
        $params[':id'] = $this->id;
        App::call()->db->execute($sql, $params);
    }

    public function sum_order($basket)
    {
        $sum = NULL;
        if (!empty($basket)) {
            foreach ($basket as $item) {
                $sum += (int)$item['quantity'] * (int)$item['price'];
            }
        }
        return $sum;
    }
}
