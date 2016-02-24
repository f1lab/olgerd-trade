<?php

/**
 * Good form.
 *
 * @package    trade
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GoodForm extends BaseGoodForm
{
  public function configure()
  {
    unset (
      $this['created_at']
      , $this['updated_at']
      , $this['created_by']
      , $this['updated_by']
      , $this['deleted_at']
      , $this['version']
    );

    $this->getWidgetSchema()
      ->offsetGet('description')
        ->setAttribute('class', 'wysiwyg')
      ->getParent()
      ->setLabels([
        'name' => 'Наименование',
        'category_id' => 'Категория',
        'dimension_id' => 'Размерность',
        'price' => 'Цена',
        'amount' => 'Количество',
        'introduction' => 'Краткое описание',
        'description' => 'Описание',
      ])
    ;

    if ($this->getObject()->isNew() || $this->getOption('fakeNew', false)) {
      $this->getWidgetSchema()->offsetSet('images', new sfWidgetFormInputFile([
        'label' => 'Загрузить изображения',
      ], [
        'multiple' => true,
        'accept' => 'image/*',
        'name' => 'images[]',
      ]));
    }
  }

  protected function doSave($con=null)
  {
    parent::doSave();
    $goodId = $this->getObject()->getId();

    $validatorFile = new sfValidatorFile([
      'path' => sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'goods',
    ]);

    $files = sfContext::getInstance()->getRequest()->getFiles('images');
    foreach ($files as $file) {
      try {
        $validatedFile = $validatorFile->clean($file);
      } catch (Exception $e) {
        continue;
      }

      $savedFile = $validatedFile->save();
      $image = Image::createFromArray([
        'good_id' => $goodId,
        'name' => $savedFile,
      ]);
      $image->save();
    }
  }
}
