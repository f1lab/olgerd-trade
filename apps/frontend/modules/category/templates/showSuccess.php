<?php slot('title', $category) ?>

<h1 class="page-header">
  <?php echo $category ?>
  <a href="<?php echo url_for('category/index') ?>" class="btn">Назад к списку</a>
</h1>

<ul class="thumbnails covers small"><?php foreach ($category->getGoods() as $good): ?>
    <li>
      <div class="thumbnail">
        <a class="cover"
          href="<?php echo url_for('good/show?id=' . $good->getId()) ?>"
          style="background-image: url(/uploads/goods/<?php echo $good->getImages()->getFirst() ?: 'default.png' ?>);"></a>

        <div class="caption">
          <a class="title" href="<?php echo url_for('good/show?id=' . $good->getId()) ?>">
            <?php echo $good ?>
          </a>
        </div>
      </div>
    </li>
  <?php endforeach ?></ul>

<?php foreach ($category->getChildren() as $child): if (!count($child->getGoods())) continue; ?>
  <h2><?php echo $child ?></h2>
  <ul class="thumbnails covers small"><?php foreach ($child->getGoods() as $good): ?>
    <li>
      <div class="thumbnail">
        <a class="cover"
          href="<?php echo url_for('good/show?id=' . $good->getId()) ?>"
          style="background-image: url(/uploads/goods/<?php echo $good->getImages()->getFirst() ?: 'default.png' ?>);"></a>

        <div class="caption">
          <a class="title" href="<?php echo url_for('good/show?id=' . $good->getId()) ?>">
            <?php echo $good ?>
          </a>
        </div>
      </div>
    </li>
  <?php endforeach ?></ul>
<?php endforeach ?>
