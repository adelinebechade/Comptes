<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<script type="text/javascript">
function noVirgule(obj) {
            obj.value=obj.value.replace(/,/g,'.')
        } 
</script>

<form action="<?php echo url_for('mouvement/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId().'&compte_id='.$form->getObject()->getCompteId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<?php echo $form->renderHiddenFields(false) ?>
<h1 class="sub-header">Modifier un mouvement</h1>
	<div id="jobs">
		<table class="seul-jobs">
			<col>
 			<col>
 			<col>
 			<col>
 			<col>
 			<col>
		    <tbody>
		        <tr>
		          <td style="text-align: center;"><?php echo $form['traite'] ?></td>
		          <td><?php echo $form['libelle'] ?></td>
		          <td><?php echo $form['date'] ?></td>
		          <td class="NumeroCentre"><?php echo $form['credit'] ?></td>
		          <td class="NumeroCentre"><?php echo $form['debit'] ?></td>
		          <td>
		            <input class="valide" type="image" src="/images/valider.gif" align="absmiddle" class="mini-actions">
		          </td>
		        </tr>
		    </tbody>
		  </table>
	</div>
</form>