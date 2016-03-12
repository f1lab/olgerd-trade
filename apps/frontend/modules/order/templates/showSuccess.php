<?php slot('title', 'Просмотр заказа') ?>

<h1 class="page-header">
  Просмотр заказа
  <a href="<?php echo url_for('order/index') ?>" class="btn">Назад к списку</a>
</h1>

<table class="table table-condensed table-bordered">
  <tbody>
    <tr>
      <th scope="row" class="span3">Id:</th>
      <td><?php echo $order->getId() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Дата создания:</th>
      <td><?php echo $order->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Статус:</th>
      <td><?php echo $order->getReadableState() ?></td>
    </tr>
  </tbody>
</table>

<h2>Состав заказа</h2>
<ul class="unstyled positions">
<?php foreach ($order->getPositions() as $position): ?>
  <li>
    <a href="<?php echo url_for('good/show?id=' . $position->getGoodId()) ?>" style="background-image: url(/uploads/goods/<?php echo $position->getGood()->getImages()->getFirst() ?: 'default.png' ?>);" target="_blank"></a>
    <div class="title"><?php echo $position->getGood() ?> × <?php echo $position->getAmount() ?></div>
  </li>
<?php endforeach ?>
</ul>

Всего позиций: <?php echo $amount ?>, на сумму: <?php echo $sum ?> руб.
