<?php use_helper('I18N', 'Date') ?>
<?php include_partial('compte/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Compte', array(), 'messages') ?></h1>

  <?php include_partial('compte/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('compte/form_header', array('compte' => $compte, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('compte/form', array('compte' => $compte, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('compte/form_footer', array('compte' => $compte, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
