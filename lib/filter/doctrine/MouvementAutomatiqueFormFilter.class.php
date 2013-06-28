<?php

/**
 * MouvementAutomatique filter form.
 *
 * @package    Comptes
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MouvementAutomatiqueFormFilter extends BaseMouvementAutomatiqueFormFilter
{
  public function configure()
  {
  	$this->setWidget('compte_id', new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Compte'), 'add_empty' => true, 'order_by' => array('ordre', 'asc'))));
  	$this->setWidget('credit', new sfWidgetFormFilterInput(array('with_empty' => false)));
  	$this->setWidget('debit', new sfWidgetFormFilterInput(array('with_empty' => false)));
  	$this->setWidget('numero_jour', new sfWidgetFormFilterInput(array('with_empty' => false)));
  	
  	$this->setWidget('created_at', new sfWidgetFormFilterDate(
  				array(	'with_empty' => false, 
  						'template' => 'Du %from_date% Au %to_date%', 
  						'from_date' => new sfWidgetFormI18nDate(array(	
  									'format' 	   => '%day%/%month%/%year%', 
  									'culture' 	   => 'fr', 
  									'month_format' => 'short_name'
  						)),
  						'to_date' => new sfWidgetFormI18nDate(array(	
  									'format' => '%day%/%month%/%year%', 
  									'culture' => 'fr', 
  									'month_format' => 'short_name'
  						))
  				)
  	));

  	$this->setWidget('updated_at', new sfWidgetFormFilterDate(
  				array(	'with_empty' => false, 
  						'template' => 'Du %from_date% Au %to_date%', 
  						'from_date' => new sfWidgetFormI18nDate(array(	
  									'format' 	   => '%day%/%month%/%year%', 
  									'culture' 	   => 'fr', 
  									'month_format' => 'short_name'
  						)),
  						'to_date' => new sfWidgetFormI18nDate(array(	
  									'format' => '%day%/%month%/%year%', 
  									'culture' => 'fr', 
  									'month_format' => 'short_name'
  						))
  				)
  	));

    $this->widgetSchema->setLabel('libelle', 'Libellé');
	$this->widgetSchema->setLabel('numero_jour', 'Numéro du jour');
    $this->widgetSchema->setLabel('credit', 'Crédit');
    $this->widgetSchema->setLabel('debit', 'Débit');
  	$this->widgetSchema->setLabel('created_at', 'Créé le');
    $this->widgetSchema->setLabel('updated_at', 'Modifié le');
  }
}
