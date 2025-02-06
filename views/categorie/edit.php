
<p class="mt-5">Modification categorie</p>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $categorie['id']; ?>">
    <div class="form-group">
      <label for="libelle">Libellé</label>
      <input type="text" class="form-control" id="libelle" name="libelle" value="<?php echo $categorie['libelle']; ?>" required>      
    </div>
    <div class="row">
      <button type="submit" name="update_categorie" class="btn btn-primary col-lg-12 mt-3">Modifier</button>
    </div>
</form>


