<?php

namespace app\controllers;

use app\engine\App;

class BasketController extends Controller
{
    public function actionBasket()
    {
        $basket = App::call()->basketRepository->getBasket();
        $sum_order = App::call()->basketRepository->sum_order($basket);

        echo $this->renderLayouts("basket", [
            "basket" => $basket,
            'sum_order' => $sum_order
        ]);
    }

    public function actionBuy()
    {
        $id = App::call()->request->getParams()['id'];
        $good = App::call()->basketRepository->getOne($id);
        $good->basketUp();
    }

    public function actionDelete()
    {
        $requset = App::call()->request->getParams();
        $id = $requset['id'];
        $basket = App::call()->basketRepository->getOneProd($id);

        if ((int)$basket->quantity <= 1) {
            $basket->delete();
        } else {
            $basket->basketRemove();
        }
    }
    
}
