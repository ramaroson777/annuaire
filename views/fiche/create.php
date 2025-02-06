
<p class="mt-5">Ajout fiche annuaire</p>
<?php 
    if(isset($message_erreur))
        echo "<p class='text-danger'> $message_erreur</p>";
?>
<form method="post">
    <div class="form-group">
      <label for="libelle">Libellé :</label>
      <input type="text" class="form-control" id="libelle" name="libelle" required>      
    </div>
    <div class="form-group">
      <label for="description">Déscription :</label>
      <input type="text" class="form-control" id="description" name="description" required>      
    </div>
    <div class="form-group">
      <label for="description">Categorie :</label>
      <?php include("views/fiche/liste_categorie.php"); ?>
    </div>
    <div class="row">
        <button type="submit" name="save_fiche" class="btn btn-success col-lg-12 mt-3 ">Ajouter</button>
    </div>
</form>