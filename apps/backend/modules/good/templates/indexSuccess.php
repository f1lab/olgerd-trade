<?php slot('title', 'Goods List') ?>

<h1 class="page-header">
  Goods List
</h1>

<div class="btn-toolbar">
  <div class="btn-group">
    <a href="<?php echo url_for('good/new') ?>" class="btn btn-primary">New</a>
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
      <th>Description</th>
      <th>Created by</th>
      <th>Updated by</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Deleted at</th>
      <th>Version</th>
    </tr>
  </thead>
  <tbody><?php foreach ($goods as $good): ?>
    <tr>
      <td><a href="<?php echo url_for('good/edit?id='.$good->getId()) ?>"><?php echo $good->getId() ?></a></td>
      <td><?php echo $good->getName() ?></td>
      <td><?php echo $good->getDimensionId() ?></td>
      <td><?php echo $good->getPrice() ?></td>
      <td><?php echo $good->getAmount() ?></td>
      <td><?php echo truncate_text($good->getDescription(), 800) ?></td>
      <td><?php echo $good->getCreatedBy() ?></td>
      <td><?php echo $good->getUpdatedBy() ?></td>
      <td><?php echo $good->getCreatedAt() ?></td>
      <td><?php echo $good->getUpdatedAt() ?></td>
      <td><?php echo $good->getDeletedAt() ?></td>
      <td><?php echo $good->getVersion() ?></td>
    </tr>
  <?php endforeach; ?></tbody>
</table>
