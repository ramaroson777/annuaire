
<p class="mt-5">Gestion categorie <a href="index.php?add_categorie=1" class="btn btn-primary">Cree nouveau categorie</a></p>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Libellé</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    
    <?php foreach ($categories as $categorie): ?>
        <tr>
            <td><?php echo $categorie['id']; ?></td>
            <td><?php echo $categorie['libelle']; ?></td>
            <td>
                <a href="index.php?edite_categorie=1&id=<?php echo $categorie['id']; ?>">Modifier</a>
                <a href="index.php?delete_categorie=1&id=<?php echo $categorie['id']; ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>

  </tbody>
</table>

