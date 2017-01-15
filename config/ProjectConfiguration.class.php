<?php

require_once '/usr/share/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();
require dirname(__FILE__) . '/../vendor/autoload.php';

class ProjectConfiguration extends sfProjectConfiguration
{
  const MAILGUN_KEY = 'key-8979ce7637d74052059dacc30b0ab30e';
  const MAILGUN_DOMAIN = 'trade.olgerd.ru';
  const MAILGUN_FROM = 'postmaster@trade.olgerd.ru';

  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->enablePlugins('sfDoctrineActAsSignablePlugin');
  }
}
