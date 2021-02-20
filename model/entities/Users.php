<?php

namespace app\model\entities;

use app\model\Model;

class Users extends Model
{
    protected $id;
    protected $login;
    protected $pass;
    public $hash;

    protected $prop = [
        'pass' => false,
        'hash' => false
    ];

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }
}
