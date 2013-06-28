<?php

/**
 * MouvementAutomatique form base class.
 *
 * @method MouvementAutomatique getObject() Returns the current form's model object
 *
 * @package    Comptes
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMouvementAutomatiqueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'compte_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Compte'), 'add_empty' => false)),
      'actif'       => new sfWidgetFormInputCheckbox(),
      'libelle'     => new sfWidgetFormInputText(),
      'numero_jour' => new sfWidgetFormInputText(),
      'credit'      => new sfWidgetFormInputText(),
      'debit'       => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'compte_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Compte'))),
      'actif'       => new sfValidatorBoolean(array('required' => false)),
      'libelle'     => new sfValidatorString(array('max_length' => 255)),
      'numero_jour' => new sfValidatorInteger(array('required' => false)),
      'credit'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'debit'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('mouvement_automatique[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MouvementAutomatique';
  }

}
