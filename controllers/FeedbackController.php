<?php

namespace app\controllers;

use app\engine\{App};
use app\model\entities\Feedback;


class FeedbackController extends Controller
{
    // В БД feedback.id = catalog.id  соответственно для каждого товара по его id вызывается соответствующий ему отзыв,
    // чтобы не было совпадений id отзывов сайта присвоил значение 0, т.к. у catalog.id есть auto_increment и он не сгенерирует 0. 
    protected $id = 0;

    public function actionFeedback()
    {
        $feedbackItem = App::call()->feedbackRepository->getAllWhere($this->id);
        var_dump($this->id);
        echo $this->renderLayouts("feedback", [
            "feedback" => $feedbackItem
        ]);
    }

    public function actionSave()
    {
        $paramsRequest =  App::call()->request->getParams();
        $this->id = $paramsRequest['id'];
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
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function actionDelete()
    {
        $paramsRequest =  App::call()->request->getParams();
        $idfeed = $paramsRequest['idfeed'];

        $feedback =  App::call()->feedbackRepository->getOne($idfeed, 'idfeed');
        $feedback->deleteFeed();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function actionEdit()
    {
        $paramsRequest =  App::call()->request->getParams();

        $idfeed = $paramsRequest['idfeed'];

        $feedbackUpdate =  App::call()->feedbackRepository->getOne($idfeed, 'idfeed');

        $feedbackItem = App::call()->feedbackRepository->getAllWhere($this->id);

        echo $this->renderLayouts("feedback", [
            "feedback" => $feedbackItem,
            "feedbackUpdate" => $feedbackUpdate
        ]);
    }
}
