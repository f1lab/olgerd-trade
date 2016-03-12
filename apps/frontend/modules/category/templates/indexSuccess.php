<?php slot('title', 'Категории') ?>

<h1 class="page-header">
  Категории
</h1>

<ul class="thumbnails covers"><?php foreach ($categorys as $category): ?>
  <li>
    <div class="thumbnail">
      <a class="cover"
        href="<?php echo url_for('category/show?id=' . $category->getId()) ?>"
        style="background-image: url(/uploads/category/<?php echo $category->getImage() ?: 'default.png' ?>);"></a>

      <div class="caption">
        <a class="title" href="<?php echo url_for('category/show?id=' . $category->getId()) ?>">
          <?php echo $category ?>
        </a>
      </div>
    </div>
  </li>
<?php endforeach ?></ul>

<h2>Новинки</h2>
<ul class="thumbnails covers small"><?php foreach ($news as $new): ?>
  <li>
    <div class="thumbnail">
      <a class="cover"
        href="<?php echo url_for('good/show?id=' . $new->getId()) ?>"
        style="background-image: url(/uploads/goods/<?php echo $new->getImages()->getFirst() ?: 'default.png' ?>);"></a>

      <div class="caption">
        <a class="title" href="<?php echo url_for('good/show?id=' . $new->getId()) ?>">
          <?php echo $new ?>
        </a>
      </div>
    </div>
  </li>
<?php endforeach ?></ul>
