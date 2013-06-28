<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<script type="text/javascript">
function noVirgule(obj) {
            obj.value=obj.value.replace(/,/g,'.')
        } 
</script>

<form action="<?php echo url_for('compte/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<?php echo $form->renderHiddenFields(false) ?>

	<div id="jobs">
		<table class="seul-jobs">
			<col>
 			<col>
 			<col>
 			<col>
 			<col>
 			<col>
		    <tbody>
		    	<?php foreach ($form['newMouvements'] as $index =>$mouvement): ?>
				<tr>
		   			<?php echo $mouvement['compte_id']->render() ?>
		    		<td style="text-align: center;"><?php echo $mouvement['traite']; ?></td>
		    		<td><?php echo $mouvement['libelle'] ?></td>
		          	<td><?php echo $mouvement['date'] ?></td>
		          	<td class="NumeroCentre"><?php echo $mouvement['credit'] ?></td>
		          	<td class="NumeroCentre"><?php echo $mouvement['debit'] ?></td>
		          	<?php if($index == 2):?>
		          	<td>
		            	<input class="valide" type="image" src="/images/valider.gif" class="mini-actions">
		          	</td>
		          	<?php endif;?>
		    	</tr>
				<?php endforeach; ?>
		    </tbody>
		  </table>
	</div>
</form>
