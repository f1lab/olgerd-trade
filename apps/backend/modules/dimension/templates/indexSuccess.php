<?php slot('title', 'Dimensions List') ?>

<h1 class="page-header">
  Dimensions List
</h1>

<div class="btn-toolbar">
  <div class="btn-group">
    <a href="<?php echo url_for('dimension/new') ?>" class="btn btn-primary">New</a>
  </div>
</div>

<table class="table table-condensed table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody><?php foreach ($dimensions as $dimension): ?>
    <tr>
      <td><a href="<?php echo url_for('dimension/edit?id='.$dimension->getId()) ?>"><?php echo $dimension->getId() ?></a></td>
      <td><?php echo $dimension->getName() ?></td>
    </tr>
  <?php endforeach; ?></tbody>
</table>
