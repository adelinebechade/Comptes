<?php

/**
 * compte actions.
 *
 * @package    Comptes
 * @subpackage compte
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class compteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  	$this->comptes = Doctrine_Core::getTable('Compte')
      ->createQuery('a')
      ->orderBy('ordre')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {  
    $this->compte = Doctrine_Core::getTable('Compte')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->compte);
    
    $this->pager = new sfDoctrinePager(
      'Mouvement',
      sfConfig::get('app_max_mouvements_on_compte')
    );

    $this->pager->setQuery($this->compte->getMouvementsQuery());
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
    
    //Appel du traitement de l'ajout des prelevements automatiques du mois en cours
    $prelevement_auto = new myPrelevementAutomatique();
	$prelevement_auto->ajoutPrelevementAutomatique($request->getParameter('id'));
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->compte_id = $request->getParameter('compte_id');
    $this->form = new CompteMouvementForm(Doctrine_Core::getTable('Compte')->find($request->getParameter('compte_id')));
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CompteMouvementForm();

    $this->processForm($request, $this->form);

    //$this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($compte = Doctrine_Core::getTable('Compte')->find(array($request->getParameter('id'))), sprintf('Object compte does not exist (%s).', $request->getParameter('id')));
    $this->form = new CompteMouvementForm($compte);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($compte = Doctrine_Core::getTable('Compte')->find(array($request->getParameter('id'))), sprintf('Object compte does not exist (%s).', $request->getParameter('id')));

    $this->form = new CompteMouvementForm($compte);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($compte = Doctrine_Core::getTable('Compte')->find(array($request->getParameter('id'))), sprintf('Object compte does not exist (%s).', $request->getParameter('id')));
    $compte->delete();

    $this->redirect('compte/index');
  }

  public function executeBarChartData(sfWebRequest $request)
  {
    $chartData = array();

    //Array with sample random data
    for( $i = 0; $i < 6; $i++ )
    {
      $chartData[] = rand(1,20);
    }

	//To create a bar chart we need to create a stBarOutline Object
	$bar = new stBarOutline( 80, '#78B9EC', '#3495FE' );
	$bar->key( 'Solde', 10 );

	//Passing the random data to bar chart
	$bar->data = $chartData;
	
	//Creating a stGraph object
	$g = new stGraph();
	
	//$g->title( 'stOfcPlugin example', '{font-size: 20px;}' );
	//Set Title from title GET parameter
	$g->title($request->getParameter('title','Unknown Title'), '{font-size: 20px;}' );
	$g->bg_colour = '#E4F5FC';
	$g->set_inner_background( '#E3F0FD', '#CBD7E6', 90 );
	$g->x_axis_colour( '#8499A4', '#E4F5FC' );
	$g->y_axis_colour( '#8499A4', '#E4F5FC' );
	//Pass stBarOutline object i.e. $bar to graph
	$g->data_sets[] = $bar;

	//Setting labels for X-Axis
	$g->set_x_labels(array( 'Adeline','','Pierre','','Commun','' ));

	// to set the format of labels on x-axis e.g. font, color, step
	$g->set_x_label_style( 10, '#18A6FF', 0, 2 );

	// To tick the values on x-axis
	// 2 means tick every 2nd value
	$g->set_x_axis_steps( 2 );

	//set maximum value for y-axis
	//we can fix the value as 20, 10 etc.
	//but its better to use max of data
	$g->set_y_max( max($chartData) );
	$g->y_label_steps( 4 );
	$g->set_y_legend( 'stOfcPlugin', 12, '#18A6FF' );
	echo $g->render();

	return sfView::NONE;

  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

    if ($form->isValid())
    {
      $compte = $form->save();

      //$this->redirect('compte/edit?id='.$compte->getId());
      $this->redirect('compte/'.$compte->getId());
    }
  }
}
