
<p class="mt-5">Suppression fiche</p>
<p>
    <form method="post">
        Supprimer fiche "<?php echo $fiche['libelle']; ?>"  ?  
        <input type="hidden" name="id" value="<?php echo $fiche['id']; ?>">
        
        <a href="index.php?gestion_fiche=1" class="btn btn-warning ml-2">Annuler</a>
        <button type="submit" name="valide_delete_fiche" class="btn btn-danger ml-2">Supprimer</button>
    </form>
</p>


