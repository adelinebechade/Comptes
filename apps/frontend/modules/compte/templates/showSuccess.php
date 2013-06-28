<?php use_helper('jQuery');?>
<?php use_helper('I18N', 'Date') ?>
<?php use_stylesheet('jobs.css') ?>

<script type="text/javascript">
function visibilite(id)
{
	var targetElement;
	targetElement = document.getElementById(id) ;

	if (targetElement.style.display == "none")
	{
		targetElement.style.display = "" ;
	}
}

function reset_div(id)
{
	var targetElement;
	targetElement = document.getElementById(id) ;

	if (targetElement.style.display == "")
	{
		targetElement.style.display = "none" ;
	}
}

$(document).ready(function() {
	$("#jobs img.mini-actions").each(function() {
		$(this).click(function() {
			reset_div('TableModifierMouvement');
			visibilite('TableAjouterMouvement');
		});
	});
	$("#jobs img.mini-actions-modif").each(function() {
		$(this).click(function() {
			reset_div('TableAjouterMouvement');
			visibilite('TableModifierMouvement');
		});
	});
});
</script>

<div id="jobs">
	<table class="jobs">
		<thead>
	    	<tr>
	      		<h1><a href="<?php echo url_for('@homepage') ?>">Liste des comptes</a> >>  <?php echo $compte->getNom();?></h1>
	    	</tr>
	  	</thead>

		<tbody>
	    	<tr>
	      		<td class="company" style="width: 10px; text-align: center;">TRAITE</td>
	      		<td class="company" style="width: 180px; text-align: center;">LIBELLE</td>
	      		<td class="company" style="width: 120px; text-align: center;">DATE</td>
	      		<td class="company" style="width: 80px; text-align: center;">CREDIT</td>
	      		<td class="company" style="width: 80px; text-align: center;">DEBIT</td>
	      		<td class="company" style="width: 40px; text-align: center;">ACTIONS</td>
	    	</tr>

	    	<?php if ($compte->getMouvements()->count() > 0): ?>	
		        <?php //foreach ($compte->getMouvements() as $mouvement): ?>
				<?php foreach ($pager->getResults() as $mouvement): ?>
				<tr>
					<td class="position" style="width: 10px;  text-align: center;"><input type="checkbox" <?php echo ($mouvement->getTraite()) ? 'disabled checked="checked"' : 'disabled'?>></td>
			    	<td class="position" style="width: 180px;"><?php echo $mouvement->getLibelle() ?></td>
			    	<td class="position" style="width: 120px; text-align: center;"><?php echo $mouvement->getDateTimeObject('date')->format('d/m/Y') ?></td>
			    	<td class="position" style="width: 80px;  text-align: center;"><?php echo $mouvement->getCredit() ?></td>
			    	<td class="position" style="width: 80px;  text-align: center;"><?php echo $mouvement->getDebit() ?></td>
			    	<td class="company"  style="width: 40px;">&nbsp;&nbsp;&nbsp;
			    		<?php echo jq_link_to_remote(image_tag('/images/modifier.gif', 
		                                                            array('title' => 'Modifier le mouvement', 'class' => 'mini-actions-modif')),
		                                                            array(
		                                                                'url'     => url_for('mouvement/edit?id='.$mouvement->getId().'&id_compte='.$compte->getId()),
		                                                                'update'  => 'TableModifierMouvement'))?>

		                &nbsp;<?php echo link_to('<img src="/images/supprimer.gif" alt="Supprimer" title="Supprimer le mouvement" />', 'mouvement/delete?id='.$mouvement->getId(), array('class' => 'mini-actions', 'method' => 'delete', 'confirm' => 'Etes-vous sûr?')) ?>
			      	</td>
				</tr>
		    	<?php endforeach;?>
				<!-- Récupération du solde courant -->
		    	<?php foreach ($mouvement->getCompteCourant() as $compte_courant):?>
			      	<?php $solde_courant = $compte->getSoldeInitial() + $compte_courant['totalCreditTraite'] - $compte_courant['totalDebitTraite'] ;?>
			    <?php endforeach;?>
			<?php else: ?>
				<?php $solde_courant = $compte->getSoldeInitial(); ?>
			<?php endif; ?>

	    	<tr>
	        	<td class="company" style="width: 10px;"></td>
	        	<td class="company" style="width: 180px;"></td>
	        	<td class="company" style="width: 120px;"></td>
	        	<td class="company" style="width: 80px;"></td>
	        	<td class="company" style="width: 80px;"></td>
	        	<td class="company" style="width: 40px; text-align: center">
	            <?php echo jq_link_to_remote(image_tag('/images/ajouter.gif',
	                                                    array(
	                                                        'title' => 'Ajouter un (ou plusieurs) mouvement(s)', 'class' => 'mini-actions')), array(
	                                                        'url'     => url_for('compte/new?compte_id='.$compte->getId()),
	                                                        'update'  => 'TableAjouterMouvement')) ?>
	        	</td>
	    	</tr>
		</tbody>
	</table>

	<br />
	
	<div id="TableAjouterMouvement"  style="display:none"></div>
	<div id="TableModifierMouvement"  style="display:none"></div>

	<br />

	<table class="seul-jobs">
		<tr>
    		<td style="width: 160px;"></td>
    		<td style="width: 160px;"></td>
    		<td style="width: 160px;"></td>
    		<td style="width: 190px;"></td>
    		<td style="width: 190px;">Solde Courant </td>
			<td style="width: 148px;"><?php echo ROUND($solde_courant,2) ?><?php //echo "<INPUT id=\"inputcenter\" size=\"12\" maxlength=\"12\" type=text name=\"solde_courant\" value=\"".$solde_courant." euros\" DISABLED>" ?></td>
    	</tr>
		<?php if ($compte->getMouvements()->count() > 0):?>
	    	<!-- Récupération du solde prévisionnel -->
			<?php foreach ($mouvement->getComptePrevisionnel() as $compte_previsionnel):?>
		      	<?php $solde_previsionnel = $compte->getSoldeInitial() + $compte_previsionnel['totalCredit'] - $compte_previsionnel['totalDebit'] ;?>
		   	<?php endforeach;?>
		<?php else: ?>
				<?php $solde_previsionnel = $compte->getSoldeInitial(); ?>
		<?php endif;?>
   		<tr>
   			<td style="width: 160px;"></td>
    		<td style="width: 160px;"></td>
    		<td style="width: 160px;"></td>
    		<td style="width: 190px;"></td>
   			<td style="width: 190px;">Solde Prévisionnel </td>
			<td style="width: 148px;"><?php echo ROUND($solde_previsionnel,2)?><?php //echo "<INPUT id=\"inputcenter\" size=\"12\" maxlength=\"12\" type=text name=\"solde_courant\" value=\"".$solde_previsionnel." euros\" DISABLED>" ?></td>
   		</tr>
   	</table>

</div>

<br />

<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for('compte', $compte) ?>?page=1">
      <img src="/images/first.png" alt="First page" title="First page" />
    </a>
 
    <a href="<?php echo url_for('compte', $compte) ?>?page=<?php echo $pager->getPreviousPage() ?>">
      <img src="/images/previous.png" alt="Previous page" title="Previous page" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('compte', $compte) ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for('compte', $compte) ?>?page=<?php echo $pager->getNextPage() ?>">
      <img src="/images/next.png" alt="Next page" title="Next page" />
    </a>
 
    <a href="<?php echo url_for('compte', $compte) ?>?page=<?php echo $pager->getLastPage() ?>">
      <img src="/images/last.png" alt="Last page" title="Last page" />
    </a>
  </div>
<?php endif; ?>
 
<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> <?php echo (count($pager) > 1) ? 'mouvements pour ce compte' : 'mouvement pour ce compte'; ?>
  <?php if ($pager->haveToPaginate()): ?>
    - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>

<br />

