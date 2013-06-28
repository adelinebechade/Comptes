<?php

/**
 * Mouvement form.
 *
 * @package    Comptes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BackendMouvementForm extends BaseMouvementForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);  

   	$this->setWidget('compte_id', new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Compte'), 'add_empty' => true)));

  	$this->setValidator('libelle', new sfValidatorString(array('required' => false,), array('required' => 'Le nom est obligatoire')));

    $dateWidget = new sfWidgetFormI18nDate(array('format' => '%day%/%month%/%year%', 'month_format' => 'short_name', 'culture' => 'fr'));
	
	$this->widgetSchema['date'] = new sfWidgetFormJQueryDate(
		array(	'config' => '{yearRange: \'1900:2109\', changeYear: true, changeMonth: true}',
				'culture' => 'fr', 
				'image' => '/images/calendar.png', 
				'date_widget' => $dateWidget
		));

	$this->widgetSchema['libelle'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Libellé'));
	$this->widgetSchema['credit'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Crédit', 'onkeyup' => 'noVirgule(this);'));
	$this->widgetSchema['debit'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Débit', 'onkeyup' => 'noVirgule(this);'));

    $this->setDefault('date', date('Y/m/d'));
  }
}