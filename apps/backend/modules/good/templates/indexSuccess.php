<?php slot('title', 'Товары') ?>

<h1 class="page-header">
  Товары
</h1>

<div class="btn-toolbar">
  <div class="btn-group">
    <a href="<?php echo url_for('good/new') ?>" class="btn btn-primary">Добавить</a>
  </div>
</div>

<table class="table table-condensed table-bordered table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Наименование</th>
      <th>Цена</th>
      <th>Количество</th>
    </tr>
  </thead>
  <tbody><?php foreach ($goods as $good): ?>
    <tr>
      <td><a href="<?php echo url_for('good/show?id='.$good->getId()) ?>"><?php echo $good->getId() ?></a></td>
      <td><a href="<?php echo url_for('good/show?id='.$good->getId()) ?>"><?php echo $good->getName() ?></a></td>
      <td><?php echo $good->getPrice() ?></td>
      <td><?php echo $good->getAmount() ?></td>
    </tr>
  <?php endforeach; ?></tbody>
</table>
