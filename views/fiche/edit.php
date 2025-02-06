<?php
    $categorieModel = new Categorie($pdo);
?>
<p class="mt-5">Modification fiche</p>

<?php 
    if(isset($message_erreur))
        echo "<p class='text-danger'> $message_erreur</p>";
?>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $fiche['id']; ?>"><br>
    <div class="form-group">
      <label for="libelle">Libellé :</label>
      <input type="text" class="form-control" id="libelle" name="libelle" value="<?php echo $fiche['libelle']; ?>" required>      
    </div>
    <div class="form-group">
      <label for="description">Déscription :</label>
      <input type="text" class="form-control" id="description" name="description"  value="<?php echo $fiche['description']; ?>" required>      
    </div>
    <div class="form-group">
      <label for="categorie">Categorie :</label>

        <?php
            $id_categories = explode(",",$fiche['id_categorie']);
            array_pop($id_categories);
            $id_categories = implode(",",$id_categories);
            $data_categories = explode(",",$id_categories );
            // var_dump($data_categories);      
        ?>
            
      <?php include("views/fiche/liste_categorie.php"); ?>
    </div>
    <div class="row">
        <button type="submit" name="update_fiche" class="btn btn-primary col-lg-12 mt-3 ">Modifier</button>
    </div>
</form>
