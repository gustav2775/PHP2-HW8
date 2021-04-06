<?php

namespace app\controllers;

use app\interfaces\IRender;
use app\engine\App;

class Controller
{
    private $defaultLayouts = "index";
    protected $render;

    public function __construct(IRender $render)
    {
        $this->render = $render;
    }

    public function renderLayouts($template, $params = [])
    {
        $id = App::call()->session->getSession()['id'];
        if(isset($id)){
            $params['is_admin'] = App::Call()->usersRepository->getOne($id)->is_admin();
        }
        return $this->render->renderVeiws("layouts/" . $this->defaultLayouts, [
            'login' => $this->render->renderVeiws('login', [
                'login' =>App::Call()->usersRepository->getLogin(),
                'auth' => App::Call()->usersRepository->auth(),
            ]),
            'menu' => $this->render->renderVeiws('menu', [
                'count' => App::call()->basketRepository->getCount()['count'],
            ]),
            'content' => $this->render->renderVeiws($template, $params)
        ]);
    }
}
