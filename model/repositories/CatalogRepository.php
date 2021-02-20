<?php

namespace app\model\repositories;

use app\engine\App;
use app\model\Repository;
use app\model\enitities\Catalog;

class CatalogRepository extends Repository
{

    public  function getTableName()
    {
        return 'catalog';
    }
    
    public  function getProduct($id)
    {
        $sql ='SELECT * FROM `catalog`,`feedback` WHERE catalog.id=feedback.id AND catalog.id=:id';
        return App::call()->db->queryAll($sql ,[":id" => $id]);
    }
}
