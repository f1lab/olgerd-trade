<?php

/**
 * category actions.
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
            ->leftJoin('c.Children')
            ->addWhere('c.parent_id is null')
            ->execute();
    }

    public function executeNew(sfWebRequest $request)
    {
        $category = new Category();
        if ($request->getParameter('id')) {
            $category->parent_id = $request->getParameter('id');
        }

        $this->form = new CategoryForm($category);
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CategoryForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($category = Doctrine_Core::getTable('Category')->find([$request->getParameter('id')]),
            sprintf('Object category does not exist (%s).', $request->getParameter('id')));
        $this->form = new CategoryForm($category);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($category = Doctrine_Core::getTable('Category')->find([$request->getParameter('id')]),
            sprintf('Object category does not exist (%s).', $request->getParameter('id')));
        $this->form = new CategoryForm($category);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($category = Doctrine_Core::getTable('Category')->find([$request->getParameter('id')]),
            sprintf('Object category does not exist (%s).', $request->getParameter('id')));
        $category->delete();

        $this->redirect('category/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $category = $form->save();

            $this->redirect('category/edit?id=' . $category->getId());
        }
    }
}
