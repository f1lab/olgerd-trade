<?php slot('title', 'Images List') ?>

<h1 class="page-header">
  Images List
</h1>

<div class="btn-toolbar">
  <div class="btn-group">
    <a href="<?php echo url_for('image/new') ?>" class="btn btn-primary">New</a>
  </div>
</div>

<table class="table table-condensed table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Good</th>
      <th>Name</th>
      <th>Created by</th>
      <th>Updated by</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Deleted at</th>
    </tr>
  </thead>
  <tbody><?php foreach ($images as $image): ?>
    <tr>
      <td><a href="<?php echo url_for('image/edit?id='.$image->getId()) ?>"><?php echo $image->getId() ?></a></td>
      <td><?php echo $image->getGoodId() ?></td>
      <td><?php echo $image->getName() ?></td>
      <td><?php echo $image->getCreatedBy() ?></td>
      <td><?php echo $image->getUpdatedBy() ?></td>
      <td><?php echo $image->getCreatedAt() ?></td>
      <td><?php echo $image->getUpdatedAt() ?></td>
      <td><?php echo $image->getDeletedAt() ?></td>
    </tr>
  <?php endforeach; ?></tbody>
</table>
