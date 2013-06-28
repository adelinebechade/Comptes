<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <table>
    <colgroup>
    	<col width="15%">
	  	<col width="15%">
	  	<col width="15%">
	  	<col width="35%">
	</colgroup>
	<tbody>
  	  <tr>
    	<td></td>
    	<th><label for="signin_username"><?php echo __('Username', null, 'sf_guard'); ?></label></th>
		<td><?php echo $form['username']->render(); ?></td>
		<td><?php echo $form['username']->renderError(); ?></td>
  	  </tr>
	  <tr>
	    <td></td>
	    <th><label for="signin_password"><?php echo __('Password', null, 'sf_guard'); ?></label></th>
	    <td><?php echo $form['password']->render(); ?></td>
	    <td><?php echo $form['password']->renderError(); ?></td>
	  </tr>
	  <tr>
	    <td></td>
	    <th><label for="signin_remember"><?php echo __('Remember', null, 'sf_guard'); ?></label></th>
	    <td><?php echo $form['remember']->render(); ?><?php echo $form->renderHiddenFields(); ?></td>
	    <td><?php echo $form['remember']->renderError(); ?></td>
	  </tr>
	</tbody>

    <tfoot>
      <tr ><td style="height: 25px;"></td><td></td><td></td></tr>
      <tr>
        <td></td>
        <td colspan="2">
          <input type="submit" value="<?php echo __('Signin', null, 'sf_guard') ?>" />
          
          <?php $routes = $sf_context->getRouting()->getRoutes() ?>
          <?php if (isset($routes['sf_guard_forgot_password'])): ?>
            <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
          <?php endif; ?>

          <?php if (isset($routes['sf_guard_register'])): ?>
            &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
          <?php endif; ?>
        </td>
      </tr>
    </tfoot>
  </table>
</form>