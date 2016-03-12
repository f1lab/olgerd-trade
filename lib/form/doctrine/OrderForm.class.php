<?php

/**
 * Order form.
 *
 * @package    trade
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OrderForm extends BaseOrderForm
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
      ->offsetGet('state')
        ->setOption('choices', Order::STATES)
        ->getParent()
      ->setLabels([
        'state' => 'Статус',
      ])
    ;
  }
}
