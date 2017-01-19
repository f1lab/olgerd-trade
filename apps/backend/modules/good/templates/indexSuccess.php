<?php slot('title', 'Товары') ?>

<h1 class="page-header">
    Товары
</h1>

<div class="row">
    <div class="span4">
        <ul>
            <?php foreach ($categories as $category): ?>
                <?php include_partial('category', compact('category', 'activeCategory')); ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="span8">
        <div class="btn-toolbar">
            <div class="btn-group">
                <a href="<?php echo url_for('good/new' . ($activeCategory ? ('?category_id=' . $activeCategory)
                        : '')) ?>" class="btn btn-primary">Добавить товар</a>
            </div>
        </div>
        <ul class="media-list">
            <?php foreach ($goods as $good): ?>
                <li class="media">
                    <a class="pull-left" href="<?php echo url_for('good/show?id=' . $good->getId()) ?>">
                        <img class="media-object span1"
                             src="/uploads/goods/<?php echo $good->getImages()->getFirst() ?: 'default.png' ?>">
                    </a>
                    <div class="media-body">
                        <a href="<?php echo url_for('good/show?id=' . $good->getId()) ?>">
                            <h4 class="media-heading"><?php echo $good->getName() ?></h4>
                        </a>
                        <p><?php echo nl2br($good->getIntroduction()) ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<style>
    li.active {
        color: #000;
        font-weight: bold;
    }
</style>
