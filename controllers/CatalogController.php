<?php

namespace app\controllers;

use app\model\entities\{Catalog, Basket, Feedback};
use app\engine\App;

class CatalogController extends Controller
{
    public function actionCatalog()
    {
        $page = App::call()->request->getParams()['page'] ?: 10;
        $catalog = App::call()->catalogRepository->getAllLimit($page);

        echo $this->renderLayouts("catalog", [
            "catalog" => $catalog,
            'page' => $page
        ]);
    }

    public function actionProduct()
    {
        $id = App::call()->request->getParams()['id'];
        $product = App::call()->catalogRepository->getProduct($id);

        echo $this->renderLayouts("product", [
            "item" => $product
        ]);
    }

    public function actionSave()
    {
        $paramsRequest = App::call()->request->getParams();
        $id = $paramsRequest['id'];

        if (isset($id)) {
            $catalog = new Catalog();
            $paramsKey = array_keys($paramsRequest);
            foreach ($paramsKey as $key) {
                $catalog->$key = $paramsRequest[$key];
            }
            App::call()->catalogRepository->update($catalog);
        } else {
            $catalog = new Catalog($paramsRequest['name_product'], $paramsRequest['price'], $paramsRequest['description']);
            App::call()->catalogRepository->insert($catalog);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function actionBuy()
    {
        $requset = App::call()->request->getParams();
        $id = $requset['id'];
        $good = App::call()->basketRepository->getOneProd($id);

        if ($good) {
            $good->basketUp();
        } else {
            $basket = new Basket(session_id(), $id, 1);
            App::call()->basketRepository->insert($basket);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function actionDelete()
    {
        $requset = App::call()->request->getParams();
        $id = $requset['id'];
        $basket = App::call()->catalogRepository->getOne($id);
        $basket->delete();
    }

    public function actionEdit()
    {
        $paramsRequest =  App::call()->request->getParams();
        $id =  $paramsRequest['id'];
        $idfeed = $paramsRequest['idfeed'];
        $product = App::call()->catalogRepository->getProduct($id);

        $feedbackUpdate =  App::call()->feedbackRepository->getOne($idfeed, 'idfeed');
        var_dump($id);
        echo $this->renderLayouts("product", [
            "item" => $product,
            "feedbackUpdate" => $feedbackUpdate
        ]);
    }

    public function actionSavefeed()
    {
        $paramsRequest =  App::call()->request->getParams();
        $id = $paramsRequest['id'];
        $date = date(' j F Y h:i:s A');

        $feedback = App::call()->feedbackRepository->getOne($paramsRequest['idfeed'], 'idfeed');

        if ($feedback) {
            $paramsKey = array_keys($paramsRequest);

            $updateFeedObj = new Feedback();

            foreach ($paramsKey as $key) {
                $updateFeedObj->$key = $paramsRequest[$key];
            }

            $updateFeedObj->id = $this->id;
            App::call()->feedbackRepository->updateFeed($updateFeedObj);

        } else {

            $feedback = new Feedback($this->id, $paramsRequest['name'], $paramsRequest['feedback'], $date);
            App::call()->feedbackRepository->insert($feedback);
        }
        header("Location:/catalog/product/?id={$id}");
    }
}
