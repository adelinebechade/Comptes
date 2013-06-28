<?php

/**
 * Compte form.
 *
 * @package    Comptes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CompteForm extends BaseCompteForm
{
  public function configure()
  {
  	unset($this['created_at'],$this['updated_at'],$this['newMouvements']);

	$this->setValidator('nom', new sfValidatorString(array('required' => true,), array('required' => 'Le nom est obligatoire')));
  	$this->setValidator('solde_initial', new sfValidatorNumber(array('required' => true,), array('required' => 'Le solde initial est obligatoire', 'invalid' => 'Le solde initial "%value%" n\'est pas un nombre.')));
  }
}