<?php

/**
 * good actions.
 * @package    trade
 * @subpackage good
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class goodActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $query = Doctrine_Query::create()
            ->from('Good g')
            ->leftJoin('g.Images i')
            ->addOrderBy('i.is_default desc');

        $categoryId = (int)$request->getParameter('category_id', 0);
        if ($categoryId > 0) {
            $query->addWhere('g.category_id = ?', $categoryId);
        }
        $this->goods = $query->execute();

        $this->categories = Doctrine_Query::create()
            ->from('Category c')
            ->leftJoin('c.Children')
            ->addWhere('c.parent_id is null')
            ->execute();
        $this->activeCategory = $categoryId;
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->good = Doctrine_Query::create()
            ->from('Good g')
            ->leftJoin('g.Images i')
            ->addOrderBy('i.is_default desc')
            ->addWhere('g.id = ?', $request->getParameter('id'))
            ->fetchOne();
        $this->forward404Unless($this->good);
    }

    public function executeNew(sfWebRequest $request)
    {
        $good = new Good();
        $categoryId = (int)$request->getParameter('category_id', 0);
        if ($categoryId > 0) {
            $good->category_id = $categoryId;
        }

        $this->form = new GoodForm($good);
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new GoodForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($good = Doctrine_Core::getTable('Good')->find([$request->getParameter('id')]),
            sprintf('Object good does not exist (%s).', $request->getParameter('id')));
        $this->form = new GoodForm($good);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($good = Doctrine_Core::getTable('Good')->find([$request->getParameter('id')]),
            sprintf('Object good does not exist (%s).', $request->getParameter('id')));
        $this->form = new GoodForm($good);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($good = Doctrine_Core::getTable('Good')->find([$request->getParameter('id')]),
            sprintf('Object good does not exist (%s).', $request->getParameter('id')));
        $good->delete();

        $this->redirect('good/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $good = $form->save();

            $this->redirect('good/show?id=' . $good->getId());
        }
    }
}
