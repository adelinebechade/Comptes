<?php use_helper('crosslink'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Banko - Administration </title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php use_stylesheet('admin.css') ?>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>
    <div id="container">
      <div id="header">
        <h1>
          <a href="<?php echo url_for('homepage') ?>">
            <img src="/images/logo.jpg" alt="Extrait des comptes" />
          </a>
        </h1>
        <div class="post">
          	<?php echo link_to(image_tag('/images/home.png'), cross_app_link_to('frontend', '@homepage')) ?>
        </div>
      </div>

	  <?php if ($sf_user->isAuthenticated()): ?>
      <div id="menu">
        <ul>
          <li><?php echo link_to('Compte', 'compte') ?></li>
          <li><?php echo link_to('Mouvement', 'mouvement') ?></li>
          <li><?php echo link_to('Mouvement Mensuel', 'mouvement_automatique') ?></li>
		  <li><?php echo link_to('Utilisateurs', 'sf_guard_user') ?></li>
		  <li><?php echo link_to('Déconnexion', 'sf_guard_signout') ?> (<?php echo $sf_user->getGuardUser()->getUsername(); ?>)</li>
        </ul>
      </div>
      <?php endif ?>

      <div id="content">
        <?php echo $sf_content ?>
      </div>
 
      <div id="footer">
        <img src="/images/jobeet-mini.png" />
        powered by <a href="http://www.symfony-project.org/">
        <img src="/images/symfony.gif" alt="symfony framework" /></a>
      </div>
    </div>
  </body>
</html>
