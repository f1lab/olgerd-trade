<?php slot('title', $good->getName()) ?>

<h1 class="page-header">
  <?php echo $good->getName() ?>
</h1>

<div class="btn-toolbar">
  <div class="btn-group">
    <a href="<?php echo url_for('good/edit?id='.$good->getId()) ?>" class="btn btn-primary">Редактировать описание</a>
  </div>
  <div class="btn-group">
    <a href="<?php echo url_for('image/index?good_id='.$good->getId()) ?>" class="btn btn-primary">Редактировать фотографии</a>
  </div>
  <div class="btn-group">
    <a href="<?php echo url_for('good/index') ?>" class="btn">Назад к списку</a>
  </div>
</div>

<a href="<?php echo url_for('image/index?good_id='.$good->getId()) ?>"><ul class="thumbnails"><?php foreach ($good->getImages() as $image): ?>
  <li class="span2">
    <img src="/uploads/goods/<?php echo $image ?>" alt="" class="thumbnail">
  </li>
<?php endforeach ?></ul></a>

<table class="table table-condensed table-bordered">
  <tbody>
    <tr>
      <th scope="row" class="span3">Id:</th>
      <td><?php echo $good->getId() ?></td>
    </tr>
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
