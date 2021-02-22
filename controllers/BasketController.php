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
        $response = [
            'count' => App::call()->basketRepository->getCount()['count']

        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
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
        $response = [
            'count' => App::call()->basketRepository->getCount()['count']
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
