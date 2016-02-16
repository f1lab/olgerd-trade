<?php slot('title', 'Изображения') ?>

<h1 class="page-header">
  Изображения
</h1>

<div class="btn-toolbar">
  <div class="btn-group">
    <a href="<?php echo url_for('good/show?id=' . $goodId) ?>" class="btn">Назад к товару</a>
  </div>
</div>

<form class="well" action="<?php echo url_for('image/upload?good_id=' . $goodId)?>"
  method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

  <?php echo $form['images']->renderRow() ?>
  <?php echo $form->renderHiddenFields() ?>

  <button type="submit" class="btn btn-primary">Загрузить</button>
</form>

<?php if (count($images)): ?>
  <ul class="thumbnails"><?php foreach ($images as $image): ?>
    <li class="span4">
      <div class="thumbnail">
        <a href="/uploads/goods/<?php echo $image ?>" data-lightbox="good">
          <img src="/uploads/goods/<?php echo $image ?>" alt="">
        </a>

        <p class="caption">
          <a href="<?php echo url_for('image/default?id=' . $image->getId()) ?>" class="btn btn-primary">Сделать главным</a>
          <?php echo link_to('Удалить', 'image/delete?id=' . $image->getId(), array(
            'method' => 'delete',
            'confirm' => 'Are you sure?',
            'class' => 'btn',
          )) ?>
        </p>
      </div>
    </li>
  <?php endforeach ?></ul>
<?php else: ?>
  <div class="alert">Ещё нет изображений.</div>
<?php endif ?>

