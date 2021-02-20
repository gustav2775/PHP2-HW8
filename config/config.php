<?php

use app\engine\{Request, Session, DefaultRender, Db, TwigRender};
use app\model\repositories\{UsersRepository,CatalogRepository,FeedbackRepository,GalleryRepository,OrdersRepository,BasketRepository};

return [
    'root_dir' => dirname(__DIR__),
    'ds' => DIRECTORY_SEPARATOR,
    'template' => dirname(__DIR__) . "/views/",
    'components' => [
        'db' => [
            "class" => Db::class,
            "driver" => "mysql",
            "host" => "localhost:",
            "dbname" => "hwphp",
            "port" => "3307",
            "login" => "phpHw",
            "pass" => "12345",
            "charset" => "utf8",
            
        ],
        'request' => [
            "class" => Request::class,
        ],
        'defaultRender' => [
            "class" => DefaultRender::class,
        ],
        'usersRepository'=>[
            "class" => UsersRepository::class,
        ],
        "catalogRepository"=>[
            "class" => CatalogRepository::class,
        ],
        'feedbackRepository'=>[
            "class" => FeedbackRepository::class,
        ],
        'basketRepository'=>[
            "class" => BasketRepository::class,
        ],
        'galleryRepository'=>[
            "class" => GalleryRepository::class,
        ],
        'ordersRepository'=>[
            "class" => OrdersRepository::class,
        ],
        'session' => [
            "class" => Session::class,
        ]
    ]
];
