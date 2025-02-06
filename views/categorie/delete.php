
<p class="mt-5">Suppression categorie</p>
<p>
    <form method="post">
        Supprimer categorie "<?php echo $categorie['libelle']; ?>" ?
        <input type="hidden" name="id" value="<?php echo $categorie['id']; ?>">
        
        <a href="index.php?gestion_categorie=1" class="btn btn-warning ml-2">Annuler</a>
        <button type="submit" name="valide_delete_categorie" class="btn btn-danger ml-2">Supprimer</button>
    </form>
</p>
