<?php echo $category->getName() ?>

<div class="actions">
    <a href="<?php echo url_for('category/edit?id=' . $category->getId()) ?>">
        <span class="icon icon-pencil"></span>
        Редактировать
    </a>
    <a href="<?php echo url_for('category/new?id=' . $category->getId()) ?>">
        <span class="icon icon-plus"></span>
        Добавить подкатегорию
    </a>
</div>

<?php if (count($category->getChildren()) !== 0): ?>
    <ul>
        <?php foreach ($category->getChildren() as $child): ?>
            <li><?php include_partial('category', ['category' => $child]) ?></li>
        <?php endforeach ?>
    </ul>
<?php endif; ?>
