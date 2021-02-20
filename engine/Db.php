<?php

namespace app\engine;

class Db
{
    private $config = [];

    public function __construct($driver = null, $host = null, $dbname = null, $port = null, $login = null, $pass = null, $charset = 'utf8')
    {
        $this->config['driver'] = $driver;
        $this->config['host'] = $host;
        $this->config['port'] = $port;
        $this->config['dbname'] = $dbname;
        $this->config['login'] = $login;
        $this->config['pass'] = $pass;
        $this->config['charset'] = $charset;
    }

    protected $connected = null;

    protected function connected()
    {
        if (is_null($this->connected)) {
            $this->connected = new \PDO($this->getDSNstr(), $this->config['login'], $this->config['pass']);
            $this->connected->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            
        }
        return $this->connected;
    }

    private function getDSNstr()
    {
        return sprintf(
            "%s:host=%s%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['port'],
            $this->config['dbname'],
            $this->config['charset']
        );
    }

    public function query($sql, $params = [])
    {
        $sth = $this->connected()->prepare($sql);
        $sth->execute($params);
        return $sth;
    }

    public function queryOne($sql, $params)
    {
        return  $this->query($sql, $params)->fetch();
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function execute($sql, $params)
    {
        $stmt = $this->connected()->prepare($sql);
        $stmt->execute($params);
    }

    public function getLastId()
    {
        return $this->connected->lastInsertId();
    }

    public function queryAllLimit($sql, $params)
    {
        $sth = $this->connected()->prepare($sql);
        $sth->bindValue(1, $params, \PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function queryOneObject($sql, $params, $class)
    {
        $stmt = $this->query($sql, $params);
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        return $stmt->fetch();
    }
}
