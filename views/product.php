<div class="container">
    <div class="productconteiner">
        <div class="item">
            <img src="/img/imgCatalog/<?= $item[0]['img_prod'] ?>" style="width: 550px;" alt="">
            <p class="catalogItem"><?= $item[0]['name_product'] ?></p>
            <p> Price : <span><?= $item[0]['price'] ?> USD</span></p>
            <p><?= $item[0]['description'] ?></p>

            <a href="/catalog/buy/?id=<?= $item['id'] ?>">Купить</a>
        </div>

        <?php if ($_SESSION['id'] == 1) : ?>
            <p>Изменить данные по товару</p>
            <form class="productUpdate" action="/catalog/save/?id=<?= $item['id'] ?>" method="post">
                <input hidden type="text" name='id' value="<?= $item['id'] ?>">
                <input class='newProductInput' type="text" name='name_product' value="" placeholder="Название товара">
                <input class='newProductInput' type="text" name='price' value="" placeholder="Цена">
                <input class='newProductInput' type="text" name='description' value="" placeholder="Описание">
                <input type="file" name="productImg" id="">
                <input class="newProductSubmit" type="submit" value="Создать">
            </form>
        <?php endif ?>
    </div>
    <div class="views">Просмотры: <?= $item['veiws'] ?></div>
</div>

<div class="container feedback">
    <?= $resultLoader ?>
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

    <form class="feedbackForm" action="/catalog/savefeed/" method="post">
        <input hidden type="text" name="id" value="<?= $item[0]['id'] ?>">
        <input hidden type="text" name="idfeed" value="<?= $feedbackUpdate->idfeed ?>">
        <input class='feedbacknameUser' type="text" name="name" value="<?= $feedbackUpdate->name ?>" placeholder="Укажите имя" checked>
        <textarea name="feedback" id="" cols="30" rows="10" placeholder="Укажите тескт комментария"><?= $feedbackUpdate->feedback ?></textarea>
        <input class="btnFeedbackForm" type="submit" value="Отправить">

    </form>
</div>