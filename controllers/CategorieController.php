<?php
require_once 'models/Categorie.php';

class CategorieController
{
    private $categorieModel;

    public function __construct($pdo)
    {
        $this->categorieModel = new Categorie($pdo);
    }

    // liste de tout les categorie
    public function index()
    {
        $categories = $this->categorieModel->getAll();
        require 'views/categorie/index.php';
    }

    // creation categorie
    public function create(array $data)
    {
        $this->categorieModel->create($data);
        header('Location: index.php?gestion_categorie=1');
    }

    // modification categorie
    public function edit($id)
    {
        $user = $this->categorieModel->getById($id);
        require 'views/categorie/edit.php';
    }

    // validation modification categorie
    public function update(array $data)
    {
        $this->categorieModel->update($data);
        header('Location: index.php?gestion_categorie=1');
    }

    // suppression categorie par id categorie
    public function delete($id)
    {
        $user = $this->categorieModel->getById($id);
        require 'views/categorie/delete.php';
    }

    // confirmation suppression categorie par id
    public function confirmDelete($id)
    {
        $this->categorieModel->delete($id);
        header('Location: index.php?gestion_categorie=1');    
    }

}
?>
