<?php slot('title', 'Show Category') ?>

<h1 class="page-header">
  Show Category
</h1>

<div class="btn-toolbar">
  <div class="btn-group">
    <a href="<?php echo url_for('category/edit?id='.$category->getId()) ?>" class="btn btn-primary">Edit</a>
  </div>
  <div class="btn-group">
    <a href="<?php echo url_for('category/index') ?>" class="btn">Back to List</a>
  </div>
</div>

<table class="table table-condensed table-bordered">
  <tbody>
    <tr>
      <th scope="row" class="span3">Id:</th>
      <td><?php echo $category->getId() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Name:</th>
      <td><?php echo $category->getName() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Image:</th>
      <td><?php echo $category->getImage() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Created by:</th>
      <td><?php echo $category->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Updated by:</th>
      <td><?php echo $category->getUpdatedBy() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Created at:</th>
      <td><?php echo $category->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Updated at:</th>
      <td><?php echo $category->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Deleted at:</th>
      <td><?php echo $category->getDeletedAt() ?></td>
    </tr>
  </tbody>
</table>
