<?php

namespace app\controllers;


use app\engine\{App};

class GalleryController extends Controller
{
    public function actionGallery()
    {
        $gallery = App::call()->galleryRepository->getAll();

        echo $this->renderLayouts("gallery", [
            "gallery" => $gallery
        ]);
    }

    public function actionGalleryItem()
    {
        $id = App::call()->request->getParams()['id'];

        $gallery = App::call()->galleryRepositor->getOne($id);

        echo $this->renderLayouts("galleryItem", [
            "itemGallery" => $gallery,
        ]);
    }
}
