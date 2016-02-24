<?php slot('title', $category) ?>

<h1 class="page-header">
  <?php echo $category ?>
</h1>

<div class="btn-toolbar">
  <div class="btn-group">
    <a href="<?php echo url_for('category/index') ?>" class="btn">Назад к списку</a>
  </div>
</div>

<ul class="thumbnails"><?php foreach ($category->getGoods() as $good): ?>
    <li class="span2">
      <div class="thumbnail">
        <a href="<?php echo url_for('good/show?id=' . $good->getId()) ?>">
          <img src="/uploads/goods/<?php echo $good->getImages()->getFirst() ?: 'default.png' ?>" alt="">
        </a>

        <div class="caption">
          <h4><?php echo $good ?></h4>
        </div>
      </div>
    </li>
  <?php endforeach ?></ul>

<?php foreach ($category->getChildren() as $child): ?>
  <h2><?php echo $child ?></h2>
  <ul class="thumbnails"><?php foreach ($child->getGoods() as $good): ?>
    <li class="span2">
      <div class="thumbnail">
        <a href="<?php echo url_for('good/show?id=' . $good->getId()) ?>">
          <img src="/uploads/goods/<?php echo $good->getImages()->getFirst() ?: 'default.png' ?>" alt="">
        </a>

        <div class="caption">
          <h4><?php echo $good ?></h4>
        </div>
      </div>
    </li>
  <?php endforeach ?></ul>
<?php endforeach ?>
