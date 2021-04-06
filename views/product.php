<div class="container">
    <div class="product_container">
        <div class="item_product">
            <div class="img_product">
                <img src="/img/imgCatalog/<?= $item[0]['img_prod'] ?>" style="width: 550px;" alt="">
                <div class="views">Просмотры: <?= $item[0]['veiws'] ?></div>
            </div>
            <div class="info_product">
                <h2 class="catalogItem"><?= $item[0]['name_product'] ?></h2>
                <p> Price : <span><?= $item[0]['price'] ?> USD</span></p>
                <p><?= $item[0]['description'] ?></p>
                <a class="product_buy" href="/catalog/buy/?id=<?= $item['id'] ?>">Купить</a>
            </div>

        </div>

        <?php if ($_SESSION['id'] == 1) : ?>
            <div class="update_product">
                <p>Изменить данные по товару</p>
                <form class="productUpdate" action="/catalog/save/?id=<?= $item[0]['id'] ?>" method="post" enctype="multipart/form-data">
                    <input hidden type="text" name='id' value="<?= $item[0]['id'] ?>">
                    <input class='newProductInput' type="text" name='name_product' value="" placeholder="Название товара">
                    <input class='newProductInput' type="text" name='price' value="" placeholder="Цена">
                    <input class='newProductInput' type="text" name='description' value="" placeholder="Описание">
                    <input type="file" name="img_prod">
                    <input class="newProductSubmit" type="submit" value="Создать">
                </form>
            </div>    
        <?php endif ?>   
    </div>

</div>

<div class="container feedback">
    <?php if (!is_null($item[0]['feedback'])) : ?>
        <div class="feedbackBox">
            <?php foreach ($item as $feedback) : ?>
                <div class="feedbackBoxItem">
                    <p class="dateFeedback"><?= $feedback['datefeedback'] ?></p>
                    <p class="nameUserFeed"> <?= $feedback['name'] ?></p>
                    <p class="feedbackText"><?= $feedback['feedback'] ?></p>

                    <div class="btnFeedbackBox">

                        <form action="/catalog/edit/" method="post">
                            <input hidden type="text" name="id" value="<?= $feedback['id'] ?>">
                            <input hidden type="text" name="idfeed" value="<?= $feedback['idfeed'] ?>">
                            <input type="submit" value="Edit">
                        </form>

                        <form action="/catalog/delete/" method="post">
                            <input hidden type="text" name="idfeed" value="<?= $feedback['idfeed'] ?>">
                            <input type="submit" value="х">
                        </form>

                    </div>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>

    <form class="feedbackForm" action="/catalog/savefeed/" method="post">
        <input hidden type="text" name="id" value="<?= $item[0]['id'] ?>">
        <input hidden type="text" name="idfeed" value="<?= $feedbackUpdate->idfeed ?>">
        <input class='feedbacknameUser' type="text" name="name" value="<?= $feedbackUpdate->name ?>" placeholder="Укажите имя" checked>
        <textarea name="feedback" id="" cols="30" rows="10" placeholder="Укажите тескт комментария"><?= $feedbackUpdate->feedback ?></textarea>
        <input class="btnFeedbackForm" type="submit" value="Отправить">

    </form>
</div>