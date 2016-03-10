<?php

/**
 * Category form.
 *
 * @package    trade
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoryForm extends BaseCategoryForm
{
  public function configure()
  {
    unset (
      $this['created_at']
      , $this['updated_at']
      , $this['created_by']
      , $this['updated_by']
      , $this['deleted_at']
    );

    $this->getWidgetSchema()
      ->offsetSet('image', new sfWidgetFormInputFileEditable([
        'file_src' => $this->getObject()->getImage(),
        'edit_mode' => !$this->getObject()->isNew(),
        'delete_label' => 'Удалить изображение',
        'template' => '<img src="/uploads/category/%file%" class="thumbnail" style="width: 150px"><br />%input%<br />%delete% %delete_label%',
      ]))
      ->setLabels([
        'name' => 'Наименование',
        'parent_id' => 'Родительская категория',
        'image' => 'Изображение',
      ])
    ;

    $this->getValidatorSchema()
      ->offsetSet('image', new sfValidatorFile(array(
        'required' => false,
        'path' => sfConfig::get('sf_upload_dir').'/category'
      )))
      ->offsetSet('image_delete', new sfValidatorBoolean())
    ;
  }
}
