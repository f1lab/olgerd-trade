<?php slot('title', 'Товары') ?>

<h1 class="page-header">
  Товары
</h1>

<div class="btn-toolbar">
  <div class="btn-group">
  </div>
</div>

<ul class="media-list"><?php foreach ($goods as $good): ?>
  <li class="media">
    <a class="pull-left" href="<?php echo url_for('good/show?id='.$good->getId()) ?>">
      <img class="media-object" src="/uploads/goods/<?php echo $good->getImages()->getFirst() ?: 'default.png' ?>" style="max-width: 128px">
    </a>
    <div class="media-body">
      <a href="<?php echo url_for('good/show?id='.$good->getId()) ?>">
        <h4 class="media-heading"><?php echo $good->getName() ?></h4>
      </a>
      <p><?php echo nl2br($good->getIntroduction()) ?></p>
    </div>
  </li>
<?php endforeach; ?></ul>
