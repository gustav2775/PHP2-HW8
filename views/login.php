<div class="container">
    <div class="authorization">
        <a href="/orders">Заказы</a>
        <?php if ($auth) : ?>
            <p class="auth"><?= $login ?><span> <a href="/auth/logout">Выход</a> </span></p>
        <?php else : ?>
            <form action="/auth/login" method="post">
                <input type="text" name="login">
                <input type="text" name="pass">
                Save? <input type="checkbox" name="save">
                <input type="submit" value="Войти">
            </form>
            <a href="/registation" class="regBtn">Регистрация</a>
        <?php endif; ?>
    </div>
</div>