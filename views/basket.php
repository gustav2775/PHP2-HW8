<div class="container">
    <?php if ($basket) : ?>
        <div class="basket">
            <div class="basketHeader">
                <div class="imgBasket"></div>
                <div class="productName">Название товара</div>
                <div class="quantityBasket">Колличество</div>
                <div class="priceBasket">Цена товара</div>
                <div class="deleteBasket"></div>
            </div>

            <div class="basketContent">
                <?php foreach ($basket as $product) : ?>
                    <div class="basketItem">
                        <img class="imgBasket" src="img/imgCatalog/<?= $product['img_prod'] ?>" alt="<?= $product["img"] ?>">
                        <div class="productName"><?= $product["name_product"] ?></div> <br>
                        <div class="quantityBasket"><?= $product["quantity"] ?></div><br>
                        <div class="priceBasket"><?= $product["price"] ?></div><br>
                        <div class="deleteBasket">
                            <button data-id='<?= $product["id"] ?>' data-method='basket' data-action='buy' class=buy> +</Button>
                            <button data-id='<?= $product["id_product"] ?>' data-action='delete' data-method='basket' class=remove> - </Button>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    <?php else : ?>
        <h2 class="clearBasket">Корзина пуста</h2>
    <?php endif; ?>

    <?php if (!empty($basket)) : ?>
        <div class="basketFooter">
            <div class="sum">Сумма : <span><?= $sum_order ?> USD </span></div>
        </div>
        <form class='btnOrder' action="/orders/createOrder/" method="post">
            <input hidden type="text" name="sum_order" value="<?= $sum_order ?>">
            <input type="submit" value="Оформить заказ">
        </form>
    <?php endif; ?>
</div>