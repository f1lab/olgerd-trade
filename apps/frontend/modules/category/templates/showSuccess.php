<?php slot('title', $category) ?>

    <h1 class="page-header">
        <?php echo $category ?>
        <a href="<?php echo url_for($category->getParentId() ? ('category/show?id=' . $category->getParentId())
            : 'category/index') ?>" class="btn">Назад к списку</a>
    </h1>

<?php include_partial('categories', ['categorys' => $category->getChildren()]) ?>

<?php if (count($category->getGoods()) === 0 && count($category->getChildren()) === 0): ?>
    <div class="alert alert-info">
        В этой категории нет товаров.
    </div>
<?php else: ?>
    <ul class="thumbnails covers small">
        <?php foreach ($category->getGoods() as $good): ?>
            <li>
                <div class="thumbnail">
                    <a class="cover"
                       href="<?php echo url_for('good/show?id=' . $good->getId()) ?>"
                       style="background-image: url(/uploads/goods/<?php echo $good->getImages()->getFirst()
                           ?: 'default.png' ?>);"></a>

                    <div class="caption">
                        <a class="title" href="<?php echo url_for('good/show?id=' . $good->getId()) ?>">
                            <?php echo $good ?>
                        </a>
                    </div>
                </div>
            </li>
        <?php endforeach ?>
    </ul>
<?php endif; ?>
