<?php

/**
 * category actions.
 *
 * @package    trade
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoryActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->categorys = Doctrine_Query::create()
      ->from('Category c')
      ->addWhere('c.parent_id is null')
      ->execute()
    ;

    $this->news = Doctrine_Query::create()
      ->from('Good g')
      ->addOrderBy('random() desc')
      ->limit(6)
      ->execute()
    ;
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->category = Doctrine_Core::getTable('Category')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->category);
  }
}
