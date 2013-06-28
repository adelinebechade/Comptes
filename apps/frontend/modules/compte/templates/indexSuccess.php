<?php use_helper('jQuery');?>
<?php use_stylesheet('jobs.css') ?>

<div id="jobs">
	<table class="jobs">
	  <thead>
	    <tr>
	      <h1>Liste des comptes</h1>
	    </tr>
	  </thead>
	  <tbody>
	  	<tr>
	  		<td class="company" style="text-align: center;">Nom</td>
	  		<td class="company" style="text-align: center;">Solde Courant</td>
	  		<td class="company" style="text-align: center;">Solde Prévisionnel</td>
			<td class="company" style="text-align: center;">Action</td>
	  	</tr>
	    <?php foreach ($comptes as $compte): ?>	    
		<tr class="actions" onclick="document.location='<?php echo url_for('compte/show?id='.$compte->getId()); ?> '"  title="Visualiser"  style="cursor:pointer;">
	      <td class="new-company">
				<?php echo $compte->getNom() ?>
				
	      </td>
	      <td class="new-company" style="text-align: center;">
			<!-- Récupération du solde courant -->
			<?php foreach ($compte->getCompteCourant() as $compte_courant):?>
			   	<?php echo $solde_courant = ROUND($compte->getSoldeInitial() + $compte_courant['totalCreditTraite'] - $compte_courant['totalDebitTraite'],2)." €" ;?>
			<?php endforeach;?>
	      </td>
	      <td class="new-company" style="text-align: center;">
			<!-- Récupération du solde prévisionnel -->
			<?php foreach ($compte->getComptePrevisionnel() as $compte_previsionnel):?>
			   	<?php echo $solde_previsionnel = ROUND($compte->getSoldeInitial() + $compte_previsionnel['totalCredit'] - $compte_previsionnel['totalDebit'],2)." €" ;?>
			<?php endforeach;?>
	      </td>
		  <td class="new-company" style="text-align: center;">
	        <a class="actions" onclick="document.location='<?php echo url_for('compte/show?id='.$compte->getId()); ?>'" title="Visualiser"  style="cursor:pointer;">
	            <img src="/images/jumelles.gif" align="absmiddle" class="actions">
			</a>
	      </td>
		</tr>
	    <?php endforeach; ?>
	  </tbody>
	</table>
</div>

<br />

<?php stOfc::createChart( 780, 350, 'stOfcExample/barChartData', false ); ?>