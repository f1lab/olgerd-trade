<?php

/**
 * image actions.
 *
 * @package    trade
 * @subpackage image
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class imageActions extends sfActions
{
  public function preExecute()
  {
    $this->goodId = $this->getRequest()->getParameter('good_id');
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->images = Doctrine_Query::create()
      ->from('Image i')
      ->addWhere('i.good_id = ?', $this->goodId)
      ->addOrderBy('i.is_default desc')
      ->execute()
    ;

    $good = Doctrine_Core::getTable('Good')->find(array($this->goodId));
    $this->form = new GoodForm($good, ['fakeNew' => true]);
    $this->form->useFields(['images']);
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($image = Doctrine_Core::getTable('Image')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
    $image->delete();

    $this->redirect('image/index?good_id=' . $image->getGoodId());
  }

  public function executeDefault(sfWebRequest $request)
  {
    $this->forward404Unless($image = Doctrine_Core::getTable('Image')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));

    Doctrine_Query::create()
      ->update('Image i')
      ->set('i.is_default', '?', false)
      ->addWhere('i.good_id = ?', $image->getGoodId())
      ->execute()
    ;

    $image
      ->setIsDefault(true)
      ->save()
    ;

    $this->redirect('image/index?good_id=' . $image->getGoodId());
  }

  public function executeUpload(sfWebRequest $request)
  {
    $this->setTemplate('index');
    $this->executeIndex($request);

    $good = Doctrine_Core::getTable('Good')->find(array($this->goodId));
    $this->form = new GoodForm($good, ['fakeNew' => true]);
    $this->form->useFields(['images']);

    $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
    if ($this->form->isValid()) {
      $good = $this->form->save();

      $this->redirect('image/index?good_id=' . $good->getId());
    }
  }
}
