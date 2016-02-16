<?php slot('title', $good->getName()) ?>

<h1 class="page-header">
  <?php echo $good->getName() ?>
</h1>

<div class="btn-toolbar">
  <div class="btn-group">
  </div>
  <div class="btn-group">
    <a href="<?php echo url_for('good/index') ?>" class="btn">Назад к списку</a>
  </div>
</div>

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
      <th scope="row" class="span3">Размерность:</th>
      <td><?php echo $good->getDimension() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Цена:</th>
      <td><?php echo $good->getPrice() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Количество:</th>
      <td><?php echo $good->getAmount() ?></td>
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
