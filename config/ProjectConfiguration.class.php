<?php

require_once '/usr/share/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();
require dirname(__FILE__) . '/../vendor/autoload.php';

class ProjectConfiguration extends sfProjectConfiguration
{
  const MAILGUN_KEY = '';
  const MAILGUN_DOMAIN = '';
  const MAILGUN_FROM = '';

  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->enablePlugins('sfDoctrineActAsSignablePlugin');
  }
}
