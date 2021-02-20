<?php


namespace app\model;

use app\engine\App;

abstract class Repository
{
    abstract function getTableName();


    public  function getOne($value, $key = 'id')
    {
        $tableName = $this->getTableName();
        $param[':' . $key] = $value;
        $sql = "SELECT * FROM {$tableName} WHERE {$key} = :{$key}";

        return App::call()->db->queryOneObject($sql, $param, static::class);
    }

    public  function getOneArray($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";

        return  App::call()->db->queryOne($sql, ['id' => $id]);
    }

    public  function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return  App::call()->db->queryAll($sql);
    }

    public  function getAllLimit($page = [])
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0 , ?";

        return  App::call()->db->queryAllLimit($sql, $page);
    }

    public  function getAllWhere($value, $key = 'id')
    {
        $tableName = $this->getTableName();
        $param[':' . $key] = $value;
        $sql = "SELECT * FROM {$tableName} WHERE {$key} = :{$key}";

        return  App::call()->db->queryAll($sql, $param);
    }

    public function insert(Model $model)
    {
        $tableName = $this->getTableName();

        foreach ($model->prop as $key => $value) {

            if ($value){
                $columns[] = $key;
                $values[] = ":" . $key;
                $params[":" . $key] =  $model->$key;
            }
        }

        $values = implode(',', $values);
        $columns = implode(',', $columns);
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";

        App::call()->db->execute($sql, $params);

        $model->id =  App::call()->db->getLastId();
        return $model;
    }

    public function update(Model $model)
    {
        $tableName = $this->getTableName();
        $params[':id'] = $model->id;

        foreach ($model->prop as $key => $value) {
            if ($value) {
                if ($key != 'id') {
                    $columns[] = $key . "  = :" . $key;
                    $params[":$key"] =  $model->$key;
                }
            }
        }
        $columns = implode(',', $columns);
        $sql = "UPDATE `$tableName` SET $columns WHERE `id`=:id";
        App::call()->db->execute($sql, $params);
        return $model;
    }


    public function delete()
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM `$tableName` WHERE `id` = :id";
        App::call()->db->execute($sql, [':id' => $this->id]);
    }
}
