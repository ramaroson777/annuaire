<?php
    $categorieModel = new Categorie($pdo);
?>

<p class="mt-5">Gestion fiche annuaire <a href="index.php?add_fiche=1" class="btn btn-primary">Cree nouveau fiche</a></p>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Libellé</th>
            <th scope="col">Actions</th>
            <th>Categories</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($fiches as $fiche): ?>
            <tr>
                <td><?php echo $fiche['id']; ?></td>
                <td><?php echo $fiche['libelle']; ?></td>
                <td><?php echo $fiche['description']; ?></td>
                <td>
                    <?php
                        $id_categories = explode(",",$fiche['id_categorie']);
                        array_pop($id_categories);
                        $id_categories = implode(",",$id_categories);
                        $categories = $categorieModel->getCategorieSelected($id_categories);
                        $liste_categ = "";
                        foreach ($categories as $categorie):
                            $liste_categ .= "<p>".$categorie['libelle']."</p>";
                        endforeach;
                        echo $liste_categ;
                    ?>
                </td>
                <td>
                    <a href="index.php?edite_fiche=1&id=<?php echo $fiche['id']; ?>">Modifier</a>
                    <a href="index.php?delete_fiche=1&id=<?php echo $fiche['id']; ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
