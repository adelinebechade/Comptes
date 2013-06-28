<?php use_helper('crosslink'); ?>
<!-- apps/frontend/templates/layout.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Banko - Gérer vos comptes</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>
    <div id="container">
      <div id="header">
        <div class="content">
          <h1>
          	<a href="<?php echo url_for('compte/index') ?>">
            	<img src="/images/logo.jpg" />
          	</a>
          </h1>
          <div class="post">
          	<?php echo link_to(image_tag('/images/console-tool.png'), cross_app_link_to('backend', '@homepage')) ?>
          </div>
          <?php if ($sf_user->isAuthenticated()): ?>
          <p id="right"><?php echo link_to('Déconnexion', 'sf_guard_signout') ?> (<?php echo $sf_user->getGuardUser()->getUsername(); ?>)</p>
          <?php endif;?>
        </div>
      </div>
 
      <div id="content">
        <?php if ($sf_user->hasFlash('notice')): ?>
          <div class="flash_notice">
            <?php echo $sf_user->getFlash('notice') ?>
          </div>
        <?php endif; ?>
 
        <?php if ($sf_user->hasFlash('error')): ?>
          <div class="flash_error">
            <?php echo $sf_user->getFlash('error') ?>
          </div>
        <?php endif; ?>
 
        <div class="content">
          <?php echo $sf_content ?>
        </div>
      </div>
 
      <div id="footer">
        <div class="content">
          <span class="symfony">
            <img src="/images/jobeet-mini.png" />
            powered by <a href="http://www.symfony-project.org/">
            <img src="/images/symfony.gif" alt="symfony framework" />
            </a>
          </span>
        </div>
      </div>
    </div>
  </body>
</html>