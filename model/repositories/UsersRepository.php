<?php

namespace app\model\repositories;

use app\model\enitities\Users;
use app\model\Repository;
use app\engine\App;

class UsersRepository extends Repository
{

    public  function getTableName()
    {
        return 'users';
    }

    public function auth()
    {
        $session = App::call()->session->getSession();
        $cookie = App::call()->session->getCookie();
        if (isset($session['login'])) {
            $user = $this->getOne($session['login'], 'login');
            if (!empty($user)) {
                return  true;
            }
        }
        if ($_COOKIE['hash']) {
            $user =  $this->getOne($cookie['hash'], 'hash');
            if (isset($user)) {
                $_SESSION['login'] = $user['login'];
                return  true;
            }
        }
        return false;
    }

    public function getLogin()
    {
        return App::call()->session->getSession()['login'];
    }

    public function is_admin()
    {
        if ($this->login === "admin") {
            return true;
        } else {
            return false;
        };
    }
}
