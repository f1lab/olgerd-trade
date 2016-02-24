<?php slot('title', 'Категории') ?>

<h1 class="page-header">
  Категории
</h1>

<div class="btn-toolbar">
  <div class="btn-group">
    <a href="<?php echo url_for('category/new') ?>" class="btn btn-primary">Добавить</a>
  </div>
</div>

<table class="table table-condensed table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Наименование</th>
    </tr>
  </thead>
  <tbody><?php foreach ($categorys as $category): ?>
    <tr>
      <td><a href="<?php echo url_for('category/edit?id='.$category->getId()) ?>"><?php echo $category->getId() ?></a></td>
      <td>
        <?php echo $category->getName() ?>
        <ul><?php foreach ($category->getChildren() as $child): ?>
          <li><?php echo $child ?></li>
        <?php endforeach ?></ul>
      </td>
    </tr>
  <?php endforeach; ?></tbody>
</table>
