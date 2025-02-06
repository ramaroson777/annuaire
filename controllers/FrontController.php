<?php
require_once 'CategorieController.php';
require_once 'FicheController.php';

class FrontController
{

    public function __construct()
    {
      
    }

    public function run($pdo)
    {

        // controller
        $categorieController = new CategorieController($pdo);
        $ficheController = new FicheController($pdo);

        // models
        $categorieModel = new Categorie($pdo);
        $ficheModel = new Fiche($pdo);

        if ( isset($_GET['gestion_categorie']) && $_GET['gestion_categorie']==1 ) {
            // liste categorie
            $categorieController->index();

        } elseif ( isset($_GET['add_categorie']) && $_GET['add_categorie']==1 ) {
            // ajout categorie
            if (isset($_POST['save_categorie'])) {
                $data = $_POST;
                $categorieController->create($data);
            }
            require 'views/categorie/create.php';

        } elseif ( isset($_GET['delete_categorie']) && $_GET['delete_categorie']==1 ) {
            // suppression categorie
            if (isset($_POST['valide_delete_categorie'])) {
                $id = $_POST['id'];
                $categorieController->confirmDelete($id);
            }
            $categorie = $categorieModel->getById($_GET['id']);
            require 'views/categorie/delete.php';

        } elseif ( isset($_GET['edite_categorie']) && $_GET['edite_categorie']==1 ) {
            // modification categorie
            if (isset($_POST['update_categorie'])) {
                $data = $_POST;
                $categorieController->update($data);
            }
            $categorie = $categorieModel->getById($_GET['id']);
            require 'views/categorie/edit.php';

        } elseif ( isset($_GET['gestion_fiche']) && $_GET['gestion_fiche']==1 ) { 
            // liste des fiche annuaire
            $ficheController->index();  


        } elseif ( isset($_GET['add_fiche']) && $_GET['add_fiche']==1 ) { 
            // ajout fiche annuaire
            if (isset($_POST['save_fiche'])) 
            {
                if(isset($_POST['categorie']))
                {
                    $id_categorie = "";
                   foreach($_POST['categorie'] as $valeur)
                   {
                      $id_categorie .= $valeur.',';
                   }
                   $_POST['id_categorie'] = $id_categorie;
                }else{
                    $message_erreur = "Erreur création fiche! Votre fiche doit associée à une ou plusieurs categories.";
                    $categories = $categorieModel->getAll();
                    require 'views/fiche/create.php';
                    exit();
                }
                $data = $_POST;
                $ficheController->create($data);
            }
            $categories = $categorieModel->getAll();
            require 'views/fiche/create.php';

        } elseif ( isset($_GET['delete_fiche']) && $_GET['delete_fiche']==1 ) {
            // suppression fiche
            if (isset($_POST['valide_delete_fiche'])) {
                $id = $_POST['id'];
                $ficheController->confirmDelete($id);
            }
            $fiche = $ficheModel->getById($_GET['id']);
            require 'views/fiche/delete.php';

        } elseif ( isset($_GET['edite_fiche']) && $_GET['edite_fiche']==1 ) {
            // modification fiche
            if (isset($_POST['update_fiche'])) {
                if(isset($_POST['categorie']))
                {
                    $id_categorie = "";
                   foreach($_POST['categorie'] as $valeur)
                   {
                      $id_categorie .= $valeur.',';
                   }
                   $_POST['id_categorie'] = $id_categorie;
                }else{
                    $message_erreur = "Erreur modification fiche! Votre fiche doit associée à une ou plusieurs categories.";
                    $fiche = $ficheModel->getById($_GET['id']);
                    $categories = $categorieModel->getAll();
                    require 'views/fiche/edit.php';
                    exit();
                }
                $data = $_POST;
                $ficheController->update($data);
            }
            $fiche = $ficheModel->getById($_GET['id']);
            $categories = $categorieModel->getAll();
            require 'views/fiche/edit.php';

        } else{
            $ficheController->index();

        }
    }

}

?>