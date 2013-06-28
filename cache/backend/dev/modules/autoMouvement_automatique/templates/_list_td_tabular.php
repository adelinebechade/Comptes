<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($mouvement_automatique->getId(), 'mouvement_automatique_edit', $mouvement_automatique) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_compte_id">
  <?php echo $mouvement_automatique->getCompteId() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_actif">
  <?php echo get_partial('mouvement_automatique/list_field_boolean', array('value' => $mouvement_automatique->getActif())) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_libelle">
  <?php echo $mouvement_automatique->getLibelle() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_numero_jour">
  <?php echo $mouvement_automatique->getNumeroJour() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_credit">
  <?php echo $mouvement_automatique->getCredit() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_debit">
  <?php echo $mouvement_automatique->getDebit() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($mouvement_automatique->getCreatedAt()) ? format_date($mouvement_automatique->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($mouvement_automatique->getUpdatedAt()) ? format_date($mouvement_automatique->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
