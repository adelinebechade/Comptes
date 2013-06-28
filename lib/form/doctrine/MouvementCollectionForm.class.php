<?php

/**
 *  DocumentCollection form.
 *
 * @package    sylvestre
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MouvementCollectionForm extends sfForm
{
  public function configure()
  {
	if (!$compte = $this->getOption('compte'))
    {
      throw new InvalidArgumentException('You must provide a compte object.');
    }
 
    for ($i = 0; $i < $this->getOption('size', 5); $i++)
    {
      $mouvement = new Mouvement();
      $mouvement->Compte = $compte;
      $mouvement->compte_id = $compte->getId();
      $compte->nom = $compte->getNom();
      $compte->solde_initial = $compte->getSoldeInitial();
	
      $form = new MouvementForm($mouvement);
 
      $this->embedForm($i, $form);
  	}
  	
  	$this->mergePostValidator(new myMouvementValidatorSchema());
  }
}
