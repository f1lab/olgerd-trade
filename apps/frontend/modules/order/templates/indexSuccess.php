<?php slot('title', 'Мои заказы') ?>

<h1 class="page-header">
  Мои заказы
  <a href="<?php echo url_for('homepage') ?>" class="btn">Назад</a>
</h1>

<table class="table table-condensed table-bordered table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Статус</th>
    </tr>
  </thead>
  <tbody><?php foreach ($orders as $order): ?>
    <tr>
      <td><a href="<?php echo url_for('order/show?id='.$order->getId()) ?>">
        Заказ №<?php echo $order->getId() ?> от <?php echo $order->getCreatedAt() ?>
      </a></td>
      <td><?php echo $order->getReadableState() ?></td>
    </tr>
  <?php endforeach; ?></tbody>
</table>
