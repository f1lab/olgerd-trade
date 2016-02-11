<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('good/'
  . ($form->getObject()->isNew() ? 'create' : 'update')
  . (!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : ''))
  ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

  <?php echo $form->renderUsing('bootstrap') ?>

  <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
  <?php endif ?>

  <div class="form-actions">
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="<?php echo url_for('good/index') ?>" class="btn">Back to list</a>

    <?php if (!$form->getObject()->isNew()): ?>
      <?php echo link_to('Delete', 'good/delete?id='.$form->getObject()->getId(), array(
        'method' => 'delete',
        'confirm' => 'Are you sure?',
        'class' => 'btn btn-warning pull-right',
      )) ?>
    <?php endif ?>
  </div>
</form>

<script src="/js/tiny-mce/tiny_mce.js"></script>
<script src="/js/go-tiny-mce.js"></script>
