<?php

/**
 * Compte filter form.
 *
 * @package    Comptes
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CompteFormFilter extends BaseCompteFormFilter
{
  public function configure()
  {
  	$this->setWidget('solde_initial', new sfWidgetFormFilterInput(array('with_empty' => false)));
  	
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

  	$this->widgetSchema->setLabel('created_at', 'Créé le');
    $this->widgetSchema->setLabel('updated_at', 'Modifié le');
  }
}
