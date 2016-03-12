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
      ->addWhere('o.created_by = ?', $this->getUser()->getGuardUser()->getId())
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

  public function executeCreate(sfWebRequest $request)
  {
    $positionsJson = $request->getPostParameter('positions', "[]");
    $positionsArray = json_decode($positionsJson, true);

    $message = '';
    $messageType = '';

    if ($request->getMethod() === 'post' || !json_last_error() || count($positionsArray) > 0) {
      $positions = array_map(function($position) {
        return [
          'good_id' => $position['id'],
          'amount' => $position['amount'],
        ];
      }, $positionsArray);
      $orderArray = [
        'Positions' => $positions,
      ];

      try {
        $order = new Order();
        $order->fromArray($orderArray);
        $order->save();

        $message = 'Заказ оформлен';
        $messageType = 'success';
      } catch (Exception $e) {}
    }

    $message = $message ?: 'Ошибка обработки заказа, попробуйте ещё раз';
    $messageType = $messageType ?: 'error';

    $this->getUser()->setFlash('alert', [$message, $messageType]);
    $this->redirect('order/index');
  }
}
