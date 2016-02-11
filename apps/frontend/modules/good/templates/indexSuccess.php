<?php slot('title', 'Goods List') ?>

<h1 class="page-header">
  Goods List
</h1>

<div class="btn-toolbar">
  <div class="btn-group">
  </div>
</div>

<table class="table table-condensed table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Dimension</th>
      <th>Price</th>
      <th>Amount</th>
    </tr>
  </thead>
  <tbody><?php foreach ($goods as $good): ?>
    <tr>
      <td><a href="<?php echo url_for('good/show?id='.$good->getId()) ?>"><?php echo $good->getId() ?></a></td>
      <td><?php echo $good->getName() ?></td>
      <td><?php echo $good->getDimensionId() ?></td>
      <td><?php echo $good->getPrice() ?></td>
      <td><?php echo $good->getAmount() ?></td>
    </tr>
  <?php endforeach; ?></tbody>
</table>
