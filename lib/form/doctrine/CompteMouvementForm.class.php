<?php

/**
 * CompteMouvement form.
 *
 * @package    Comptes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CompteMouvementForm extends BaseCompteForm
{
  public function configure()
  {
  	unset($this['created_at'], $this['updated_at'], $this['nom'], $this['solde_initial']);

  	$form = new MouvementCollectionForm(null, array(
    	'compte' => $this->getObject(),
    	'size'    => 5,
  	));
  	
  	$this->embedForm('newMouvements', $form);
  }

  public function saveEmbeddedForms($con = null, $forms = null)
  {
  	if (null === $forms)
    {
      $mouvements = $this->getValue('newMouvements');
      $forms = $this->embeddedForms;
      foreach ($this->embeddedForms['newMouvements'] as $name => $form)
      {
        if (!isset($mouvements[$name]))
        {
          unset($forms['newMouvements'][$name]);
        }
      }
    }

    return parent::saveEmbeddedForms($con, $forms);
  }
}