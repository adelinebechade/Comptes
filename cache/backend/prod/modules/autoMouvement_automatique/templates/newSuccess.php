<?php use_helper('I18N', 'Date') ?>
<?php include_partial('mouvement_automatique/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Mouvement automatique', array(), 'messages') ?></h1>

  <?php include_partial('mouvement_automatique/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('mouvement_automatique/form_header', array('mouvement_automatique' => $mouvement_automatique, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('mouvement_automatique/form', array('mouvement_automatique' => $mouvement_automatique, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('mouvement_automatique/form_footer', array('mouvement_automatique' => $mouvement_automatique, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
