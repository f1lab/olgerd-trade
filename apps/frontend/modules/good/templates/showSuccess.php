<?php slot('title', 'Show Good') ?>

<h1 class="page-header">
  Show Good
</h1>

<div class="btn-toolbar">
  <div class="btn-group">
  </div>
  <div class="btn-group">
    <a href="<?php echo url_for('good/index') ?>" class="btn">Back to List</a>
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
      <td><?php echo $good->getRawValue()->getDescription() ?></td>
    </tr>
  </tbody>
</table>
