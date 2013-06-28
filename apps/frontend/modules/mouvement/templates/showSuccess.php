<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $mouvement->getId() ?></td>
    </tr>
    <tr>
      <th>Compte:</th>
      <td><?php echo $mouvement->getCompteId() ?></td>
    </tr>
    <tr>
      <th>Traite:</th>
      <td><?php echo $mouvement->getTraite() ?></td>
    </tr>
    <tr>
      <th>Libelle:</th>
      <td><?php echo $mouvement->getLibelle() ?></td>
    </tr>
    <tr>
      <th>Date:</th>
      <td><?php echo $mouvement->getDate() ?></td>
    </tr>
    <tr>
      <th>Credit:</th>
      <td><?php echo $mouvement->getCredit() ?></td>
    </tr>
    <tr>
      <th>Debit:</th>
      <td><?php echo $mouvement->getDebit() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $mouvement->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $mouvement->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('mouvement/edit?id='.$mouvement->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('mouvement/index') ?>">List</a>
