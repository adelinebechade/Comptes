<h1>Mouvements List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Compte</th>
      <th>Traite</th>
      <th>Libelle</th>
      <th>Date</th>
      <th>Credit</th>
      <th>Debit</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($mouvements as $mouvement): ?>
    <tr>
      <td><a href="<?php echo url_for('mouvement/show?id='.$mouvement->getId()) ?>"><?php echo $mouvement->getId() ?></a></td>
      <td><?php echo $mouvement->getCompteId() ?></td>
      <td><?php echo $mouvement->getTraite() ?></td>
      <td><?php echo $mouvement->getLibelle() ?></td>
      <td><?php echo $mouvement->getDate() ?></td>
      <td><?php echo $mouvement->getCredit() ?></td>
      <td><?php echo $mouvement->getDebit() ?></td>
      <td><?php echo $mouvement->getCreatedAt() ?></td>
      <td><?php echo $mouvement->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('mouvement/new') ?>">New</a>
