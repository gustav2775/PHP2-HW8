<?php

namespace app\model\repositories;

use app\model\Repository;
use app\engine\App;

class FeedbackRepository extends Repository
{

    public  function getTableName()
    {
        return 'feedback';
    }

    public function deleteFeed()
    {
        $sql = "DELETE FROM `feedback` WHERE `idfeed` = :idfeed";
        App::call()->db->execute($sql, [':idfeed' => $this->idfeed]);
    }

    public function updateFeed($model)
    {
        $tableName = $this->getTableName();
        $params[':idfeed'] = $model->idfeed;

        foreach ($model->prop as $key => $value) {
            if ($value) {
                if ($key != 'id') {
                    $columns[] = $key . "  = :" . $key;
                    $params[":$key"] =  $model->$key;
                }
            }
        }
        $columns = implode(',', $columns);
        $sql = "UPDATE `$tableName` SET $columns WHERE `idfeed`=:idfeed";
        
        App::call()->db->execute($sql, $params);
        return $model;
    }
}
