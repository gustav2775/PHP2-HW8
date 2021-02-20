<div class="container">
    <?php if ($orders) : ?>
        <h3>Размещенные заказы</h3>
        <div class="orders">
            <div class="ordersHeader">
                <p class="">№ Заказа</p>
                <p class="">id пользователя</p>
                <p>Сумма заказа</p>
                <?php if ($is_admin) : ?>
                    <p class="status">Статус заказа</p>
                    <p>Удалить заказ из базы</p>
                <?php else : ?>
                    <p class="status"></p>
                    <p>Пометить на удаление</p>
                <?php endif ?>

            </div>
            <?php foreach ($orders as $order) : ?>
                <div class="orderAdm">
                    <p> <a href="/orders/order/?id= <?= $order['id'] ?>"> <?= $order['id'] ?></a></p>
                    <p> <?= $order['id_user'] ?></p>
                    <p> <?= $order['sum_order'] ?></p>
                    <?php if ($is_admin) : ?>
                        <form action="/orders/status/?id=<?= $order['id'] ?>" method="post" class="status">
                            <input hidden type="text" name="idorder" value="<?= $order['id'] ?>">
                            <select name="status" id="status">
                                <option hidden value="processing"><?= $order['status'] ?></option>
                                <option value="подтвержден">Заказ подтвержден</option>
                                <option value="отправлен">Заказ отправлен</option>
                                <option value="выполнен">Заказ выполнен</option>
                                <option value="отменен">Заказ отменен</option>
                            </select>
                            <input type="submit" value="Изменить">
                        </form>
                        <form action="/orders/delete/?id=<?= $order['id'] ?>" method="post" class="deleteOrder">
                            <input hidden type="text" name="action" value="delete">
                            <input hidden type="text" name="idorder" value="<?= $order['id'] ?>">
                            <input type="submit" value="X">
                        </form>
                    <?php else : ?>
                        <?php if (is_null($order['status'])) : ?>
                            <form action="/orders/pay/?id=<?= $order['id'] ?>" method="post" class="deleteOrder">
                                <input hidden type="text" name="Pay" value="<?= $order['sumOrder'] ?>">
                                <input hidden type="text" name="status" value="Оплачено">
                                <input hidden type="text" name="idorder" value="<?= $order['id'] ?>">
                                <input type="submit" value="Оплатить">
                            </form>
                        <?php else : ?>
                            <p> <?= $order['status'] ?> </p>
                        <?php endif ?>
                        <form action="/orders/checkDelete/?id=<?= $order['id'] ?>" method="post" class="deleteOrder">
                            <input hidden type="text" name="idorder" value="<?= $order['id'] ?>">
                            <input type="checkbox" name="status" value="Удалить">
                            <input type="submit" value="Подтвердить">
                        </form>
                    <?php endif ?>
                </div>
            <?php endforeach ?>
        </div>
    <?php else : ?>
        <p>Заказов нет</p>
    <?php endif ?>
</div>