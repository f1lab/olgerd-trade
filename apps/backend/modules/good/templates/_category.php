<li<?php if ($activeCategory == $category->getId()): echo ' class="active"'; endif; ?>>
    <a href="?category_id=<?php echo $category->getId() ?>">
        <?php echo $category->getName() ?>
    </a>

    <?php if (count($category->getChildren()) !== 0): ?>
        <ul>
            <?php foreach ($category->getChildren() as $child): ?>
                <?php include_partial('category', ['category' => $child, 'activeCategory' => $activeCategory]) ?>
            <?php endforeach ?>
        </ul>
    <?php endif; ?>
</li>
