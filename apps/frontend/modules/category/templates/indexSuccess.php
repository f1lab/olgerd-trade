<?php slot('title', 'Категории') ?>

<h1 class="page-header">
  Категории
</h1>

<ul class="thumbnails"><?php foreach ($categorys as $category): ?>
  <li class="span2">
    <div class="thumbnail">
      <a href="<?php echo url_for('good/index?category_id=' . $category->getId()) ?>">
        <img src="/uploads/goods/default.png<?php //echo $category ?>" alt="">
      </a>

      <div class="caption">
        <h4><?php echo $category ?></h4>
      </div>
    </div>
  </li>
<?php endforeach ?>

  <li class="span2">
    <div class="thumbnail">
      <a href="<?php echo url_for('good/index') ?>">
        <img src="/uploads/goods/default.png<?php //echo $category ?>" alt="">
      </a>

      <div class="caption">
        <h4>Без категории</h4>
      </div>
    </div>
  </li>

</ul>
