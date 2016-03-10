<?php slot('title', 'Категории') ?>

<h1 class="page-header">
  Категории
</h1>

<ul class="thumbnails covers"><?php foreach ($categorys as $category): ?>
  <li class="span3">
    <div class="thumbnail">
      <a class="cover"
        href="<?php echo url_for('category/show?id=' . $category->getId()) ?>"
        style="background-image: url(/uploads/category/<?php echo $category->getImage() ?: 'default.png' ?>);"></a>

      <div class="caption">
        <a href="<?php echo url_for('category/show?id=' . $category->getId()) ?>" class="title"><?php echo $category ?></a>
      </div>
    </div>
  </li>
<?php endforeach ?></ul>
