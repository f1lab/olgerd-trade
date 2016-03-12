<?php

/**
 * order actions.
 *
 * @package    trade
 * @subpackage order
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class orderActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->orders = Doctrine_Query::create()
      ->from('Order o')
      ->execute()
    ;
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->order = Doctrine_Query::create()
      ->from('Order o')
      ->leftJoin('o.Positions p')
      ->leftJoin('p.Good')
      ->addWhere('o.id = ?', $request->getParameter('id'))
      ->fetchOne()
    ;
    $this->forward404Unless($this->order);

    $this->amount = array_reduce($this->order->getPositions()->toArray(), function($amount, $position) {
      return $amount += $position['amount'];
    }, 0);
    $this->sum = array_reduce($this->order->getPositions()->toArray(), function($sum, $position) {
      return $sum += $position['amount'] * $position['Good']['price'];
    }, 0);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new OrderForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new OrderForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($order = Doctrine_Core::getTable('Order')->find(array($request->getParameter('id'))), sprintf('Object order does not exist (%s).', $request->getParameter('id')));
    $this->form = new OrderForm($order);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($order = Doctrine_Core::getTable('Order')->find(array($request->getParameter('id'))), sprintf('Object order does not exist (%s).', $request->getParameter('id')));
    $this->form = new OrderForm($order);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($order = Doctrine_Core::getTable('Order')->find(array($request->getParameter('id'))), sprintf('Object order does not exist (%s).', $request->getParameter('id')));
    $order->delete();

    $this->redirect('order/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $order = $form->save();

      $this->redirect('order/edit?id='.$order->getId());
    }
  }
}
