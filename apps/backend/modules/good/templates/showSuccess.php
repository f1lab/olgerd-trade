<?php slot('title', 'Товар: ' . $good->getName()) ?>

<h1 class="page-header">
  Товар: <?php echo $good->getName() ?>
</h1>

<div class="btn-toolbar">
  <div class="btn-group">
    <a href="<?php echo url_for('good/edit?id='.$good->getId()) ?>" class="btn btn-primary">Редактировать описание</a>
  </div>
  <div class="btn-group">
    <a href="<?php echo url_for('good/edit?id='.$good->getId()) ?>" class="btn btn-primary">Редактировать фотографии</a>
  </div>
  <div class="btn-group">
    <a href="<?php echo url_for('good/index') ?>" class="btn">Назад к списку</a>
  </div>
</div>

<table class="table table-condensed table-bordered">
  <tbody>
    <tr>
      <th scope="row" class="span3">Id:</th>
      <td><?php echo $good->getId() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Name:</th>
      <td><?php echo $good->getName() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Dimension:</th>
      <td><?php echo $good->getDimensionId() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Price:</th>
      <td><?php echo $good->getPrice() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Amount:</th>
      <td><?php echo $good->getAmount() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Description:</th>
      <td><?php echo $sf_data->getRaw('good')->getDescription() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Created by:</th>
      <td><?php echo $good->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Updated by:</th>
      <td><?php echo $good->getUpdatedBy() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Created at:</th>
      <td><?php echo $good->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Updated at:</th>
      <td><?php echo $good->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Deleted at:</th>
      <td><?php echo $good->getDeletedAt() ?></td>
    </tr>
  </tbody>
</table>
