<?php

/**
 * mouvement actions.
 *
 * @package    Comptes
 * @subpackage mouvement
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mouvementActions extends sfActions
{
  public function executeNew(sfWebRequest $request)
  {
    // Form initialization
    $mouvement = new Mouvement();
    $mouvement->setCompteId($request->getParameter('compte_id'));

    $this->form = new MouvementForm($mouvement);
    $this->compte_id = $request->getParameter('compte_id');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MouvementForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($mouvement = Doctrine_Core::getTable('Mouvement')->find(array($request->getParameter('id'))), sprintf('Object mouvement does not exist (%s).', $request->getParameter('id')));
    $this->form = new MouvementForm($mouvement);
    //var_dump($request->getParameterHolder()->get('page'));exit();
  }

  public function executeUpdate(sfWebRequest $request)
  {
  	$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($mouvement = Doctrine_Core::getTable('Mouvement')->find(array($request->getParameter('id'))), sprintf('Object mouvement does not exist (%s).', $request->getParameter('id')));
    $this->form = new MouvementForm($mouvement);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($mouvement = Doctrine_Core::getTable('Mouvement')->find(array($request->getParameter('id'))), sprintf('Object mouvement does not exist (%s).', $request->getParameter('id')));
    $mouvement->delete();

    $this->redirect('compte/show?id='.$mouvement->getCompteId());
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
  	$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $mouvement = $form->save();
      $this->redirect('compte/show?id='.$mouvement->getCompteId());
    }
  }
}
