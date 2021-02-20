<?php

namespace app\controllers;

use app\model\repositories\{UsersRepository};
use app\model\entities\{Orders};
use app\engine\{App};

class OrdersController extends Controller
{
    public function actionOrders()
    {
        $id = App::call()->session->getSession()['id'];
        if (isset($id)) {
            $is_admin =  App::call()->usersRepository->getOne($id)->is_admin();
            
            if ($is_admin) {
                $orders = App::call()->ordersRepository->getAll();
            } else {
                $orders = App::call()->ordersRepository->getAllWhere($id,'id_user');
            }
        }

        echo $this->renderLayouts("orders", [
            "orders" => $orders
        ]);
    }

    public function actionOrder()
    {
        $id = App::call()->request->getParams()['id'];
        $order = App::call()->ordersRepository->getOne($id);
        $products = $order->getProduct($order);
        echo $this->renderLayouts("order", [
            "order" => $order,
            'products' => $products
        ]);
    }

    public function actionCreateOrder()
    {
        $sum_order = App::call()->request->getParams()['sum_order'];
        $id_user = App::call()->session->getSession()['id'] ?:0;
        $basket = App::call()->basketRepository->getBasket();
        $data_products = json_encode($basket);
        $order = new Orders($id_user, $data_products, $sum_order);

        App::call()->ordersRepository->insert($order);
        header('location:/orders/order/?id='. $order->id);
    }
    
    public function actionCreate()
    {
        $params = App::call()->request->getParams();
        $order = (new Orders);

        $order->id = $params['id'];
        $order->user_name = $params['user_name'];
        $order->email = $params['email'];
        $order->number = $params['number'];
        $order->adress = $params['adress'];
        $order->status = 'не оплачен';

        App::call()->ordersRepository->update($order);
        App::call()->basketRepository->deleteBasket();

        header('location:/orders/order/?id='. $order->id);
    }

    public function actionStatus()
    {
        $params = App::call()->request->getParams();
        $order = (new Orders);
        $order->id = $params['id'];
        $order->status = $params['status'];

        App::call()->ordersRepository->update($order);
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function actionPay()
    {
        $params = App::call()->request->getParams();
        $order = (new Orders);
        $order->id = $params['id'];
        $order->status = $params['status'];

        App::call()->ordersRepository->update($order);
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function actionCheckDelete()
    {
        $params = App::call()->request->getParams();
        $order = (new Orders);
        $order->id = $params['id'];
        $order->status = $params['status'];
        
        App::call()->ordersRepository->update($order);
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function actionDelete()
    {
        $params = App::call()->request->getParams();
        $id = $params['id'];

        App::call()->ordersRepository->getOne($id)->delete();
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
