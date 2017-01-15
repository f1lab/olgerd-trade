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
        <th>Наименование</th>
    </tr>
    </thead>
    <tbody><?php foreach ($categorys as $category): ?>
        <tr>
            <td>
                <?php include_partial('category', compact('category')) ?>
            </td>
        </tr>
    <?php endforeach; ?></tbody>
</table>

<style>
    .actions {
        display: none;
    }
    td:hover > .actions,
    li:hover > .actions {
        display: inline-block;
    }
    td ul {
        margin-bottom: .5em;
    }
</style>
