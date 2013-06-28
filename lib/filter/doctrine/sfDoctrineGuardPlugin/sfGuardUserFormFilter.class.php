<?php

/**
 * sfGuardUser filter form.
 *
 * @package    Comptes
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserFormFilter extends PluginsfGuardUserFormFilter
{
  public function configure()
  {
    unset($this['algorithm'], $this['salt'], $this['password'], 
    		$this['groups_list'], $this['permissions_list'], $this['created_at'], $this['updated_at']);

  	foreach (array('first_name', 'last_name', 'last_login') as $field)
    {
      $this->getWidget($field)->setOption('with_empty', false);
    }

  	$this->widgetSchema->setLabel('first_name', 'Prénom');
	$this->widgetSchema->setLabel('last_name', 'Nom');
	$this->widgetSchema->setLabel('email_address', 'E-mail');
  }
}
