<?php slot('title', $good->getName()) ?>

<h1 class="page-header">
  <?php echo $good->getName() ?>
  <a href="<?php echo url_for('category/show?id=' . $good->getTopCategoryId()) ?>" class="btn">Назад к списку</a>
</h1>

<p><a href="<?php echo url_for('sf_guard_signin') ?>" class="btn btn-large btn-primary" data-add-order-position="<?php echo $good->toJson() ?>" data-authenticated="<?php echo $sf_user->isAuthenticated() ?>">Заказать</a></p>

<ul class="thumbnails"><?php foreach ($good->getImages() as $image): ?>
  <li class="span2">
    <a href="/uploads/goods/<?php echo $image ?>" class="thumbnail" data-lightbox="good">
      <img src="/uploads/goods/<?php echo $image ?>" alt="">
    </a>
  </li>
<?php endforeach ?></ul>

<table class="table table-condensed table-bordered">
  <tbody>
    <tr>
      <th scope="row" class="span3">Наименование:</th>
      <td><?php echo $good->getName() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Единица:</th>
      <td><?php echo $good->getDimension() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Цена за единицу:</th>
      <td><?php echo $good->getPrice() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Минимальный заказ:</th>
      <td><?php echo $good->getAmount() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Стоимость минимального заказа:</th>
      <td><?php echo $good->getMinimalOrderPrice() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Краткое описание:</th>
      <td><?php echo nl2br($good->getIntroduction()) ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Описание:</th>
      <td><?php echo $good->getRawValue()->getDescription() ?></td>
    </tr>
  </tbody>
</table>
