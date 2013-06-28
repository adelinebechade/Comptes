<?php

/**
 * mouvement_automatique module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage mouvement_automatique
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseMouvement_automatiqueGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'mouvement_automatique' : 'mouvement_automatique_'.$action;
  }
}
