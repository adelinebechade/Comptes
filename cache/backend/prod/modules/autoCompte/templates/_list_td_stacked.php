<td colspan="5">
  <?php echo __('%%id%% - %%nom%% - %%solde_initial%% - %%created_at%% - %%updated_at%%', array('%%id%%' => link_to($compte->getId(), 'compte_edit', $compte), '%%nom%%' => $compte->getNom(), '%%solde_initial%%' => $compte->getSoldeInitial(), '%%created_at%%' => false !== strtotime($compte->getCreatedAt()) ? format_date($compte->getCreatedAt(), "f") : '&nbsp;', '%%updated_at%%' => false !== strtotime($compte->getUpdatedAt()) ? format_date($compte->getUpdatedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>
