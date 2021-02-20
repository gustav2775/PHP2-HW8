<div class="container">
  <div class="catalogHeader">
    <h1>Каталог</h1>
  </div>
  <?php if ($_SESSION['id'] == 1) : ?>
    <p>Создать новый товар</p>
    <form class=newProduct action="/catalog/save" method="post">
      <input class="newProductInput" type="text" name='name_product' placeholder="Название товара">
      <input class="newProductInput" type="text" name='price' placeholder="Цена">
      <input class="newProductInput" type="text" name='description' placeholder="Описание">
      <input type="file" name="productImg" id="">
      <input class="newProductSubmit" type="submit" value="Создать">
    </form>
  <?php endif ?>

  <div class="catalog">
    <?php foreach ($catalog as $item) : ?>
      <div class="item">
        <a href="/catalog/product/?id=<?= $item['id'] ?>">
          <div class="imgitem">
            <img src="/img/imgCatalog/<?= $item['img_prod'] ?>" style="width: 250px;" alt="">
          </div>
          <p class="catalogItem"><?= $item['name_product'] ?></p>
          <p> Price : <span><?= $item['price'] ?> USD</span></p>
        </a>
        <?php if ($_SESSION['id'] == 1) : ?>
          <a href="/catalog/delete/?id=<?= $item['id'] ?>">[x]</a> 
        <?php endif ?>
        <button class="buy" data-id= "<?= $item['id'] ?>" data-method ='catalog' data-action= 'buy'>Купить </button>
      </div>
    <?php endforeach ?>
  </div>
  
  <a href="/catalog/catalog/?page=<?=$page + 5?>">Показать еще 5</a>
</div>

