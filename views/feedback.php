<div class="container feedback">
    <?= $resultLoader ?>
    <div class="feedbackBox">
        <?php foreach ($feedback as $item) : ?>
            <div class="feedbackBoxItem">
                <p class="dateFeedback"><?= $item['datefeedback'] ?></p>
                <p class="nameUserFeed"> <?= $item['name'] ?></p>
                <p class="feedbackText"><?= $item['feedback'] ?></p>
                <div class="btnFeedbackBox">

                    <form action="/feedback/edit/" method="post">
                        <input hidden type="text" name="idfeed" value="<?= $item['idfeed'] ?>">
                        <input type="submit" value="Edit">
                    </form>

                    <form action="/feedback/delete/" method="post">
                        <input hidden type="text" name="idfeed" value="<?= $item['idfeed'] ?>">
                        <input type="submit" value="х">
                    </form>

                </div>
            </div>
        <?php endforeach ?>
    </div>

    <form class="feedbackForm" action="/feedback/save/" method="post">
        <input hidden type="text" name="id" value="<?= $item['id']?>">
        <input hidden type="text" name="idfeed" value="<?= $feedbackUpdate->idfeed ?>">
        <input class='feedbacknameUser' type="text" name="name" value="<?= $feedbackUpdate->name ?>" placeholder="Укажите имя" checked>
        <textarea name="feedback" id="" cols="30" rows="10" placeholder="Укажите тескт комментария"><?= $feedbackUpdate->feedback ?></textarea>

        <input class="btnFeedbackForm" type="submit" value="Отправить">

    </form>
</div>