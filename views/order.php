<div class="container order">
    <div class="orderBox">
        <div class="orderinf">
            <?php if (!empty($order->user_name)) : ?>
                <p> Заказ № <?= $order->id ?> <?= $order->status ?> </p>
                <p> id пользователя: <?= $order->id_user ?></p>
                <p> Имя: <?= $order->user_name ?></p>
                <p> Номер телефона: <?= $order->number ?></p>
                <p> Электронная почта:<?= $order->email ?></p>
                <p> Адрес: <?= $order->adress ?></p>
            <?php else : ?>
                <form class="orderForm" action="/orders/create/?id= <?= $order->id ?>" method="post">
                    <h3>Введите контактные данные для оформления заказа</h3>
                    <label for="1">Укажите ФИО </label>
                    <input type="text" placeholder="ФИО" name="user_name" id="1">
                    <label for="2">Укажите электронную почту </label>
                    <input type="email" placeholder="mail@mail.com" name="email" id="2">
                    <label for="3">Укажите номер телефона </label>
                    <input type="tel" placeholder="+7 000 000 00 00" name="number" id="3">
                    <label for="4">Адрес для отправки заказа </label>
                    <input type="text" placeholder="Укажите адрес" name="adress" id="4">
                    <input type="submit" value="Разместить заказ">
                </form>
            <?php endif; ?>
        </div>
        <div class="orderItemOrder">
            <div class="itemsOrder">
                <div class="productName">Название продукта</div>
                <div class="quantityBasket">Колличество</div>
                <div class="priceBasket">Цена за шт</div>
            </div>
            <?php foreach ($products as $item) : ?>
                <div class="itemsOrder">
                    <div class="productName"><?= $item['name_product'] ?></div> <br>
                    <div class="quantityBasket"><?= $item['quantity'] ?></div><br>
                    <div class="priceBasket"><?= $item['price'] ?></div><br>
                </div>
            <?php endforeach ?>
            <p> Сумма заказа: <?= $order->sum_order ?> USD</p>
        </div>
    </div>
    <?php if ($order->status == 'не оплачен') : ?>
        <form action="/orders/pay/?id= <?= $order->id ?>" method="post">
            <input hidden type="text" name='sum_order' value="<?= $order->sum_order ?>">
            <input hidden type="text" name='status' value="оплачен">
            <input type="submit" value="Оплатить">
        </form>
    <?php endif; ?>

</div>