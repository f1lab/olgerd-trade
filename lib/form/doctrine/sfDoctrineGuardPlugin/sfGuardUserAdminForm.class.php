<?php

/**
 * sfGuardUserAdminForm for admin generators
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUserAdminForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardUserAdminForm extends BasesfGuardUserAdminForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {
    unset (
      $this['username']
      , $this['is_active']
      , $this['is_super_admin']
    );

    $this->widgetSchema->setLabels([
      'first_name' => 'Имя',
      'last_name' => 'Фамилия',
      'email_address' => 'Email',
      'password' => 'Пароль',
      'password_again' => 'Пароль ещё раз',
    ]);
  }
}

