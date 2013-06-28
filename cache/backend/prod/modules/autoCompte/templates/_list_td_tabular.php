<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($compte->getId(), 'compte_edit', $compte) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_nom">
  <?php echo $compte->getNom() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_solde_initial">
  <?php echo $compte->getSoldeInitial() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($compte->getCreatedAt()) ? format_date($compte->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($compte->getUpdatedAt()) ? format_date($compte->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
