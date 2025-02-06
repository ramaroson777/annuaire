
<?php foreach ($categories as $categorie): ?>
    <li style="list-style: none ;">
          <input type="checkbox" name="categorie[]" id="categorie_<?php echo $categorie['id']; ?>" value="<?php echo $categorie['id']; ?>" style="margin-right: 7px;" 
          <?php 
            if( isset($data_categories) ){
              if( in_array($categorie['id'], $data_categories) ){
                echo 'checked';
              }
            }
          ?>
          ><?php echo $categorie['libelle']; ?>   
    </li>
<?php endforeach; ?>