<?php
require_once 'models/Fiche.php';

class FicheController
{
    private $ficheModel;
    private $pdo;

    public function __construct($pdo)
    {
        $this->ficheModel = new Fiche($pdo);
        $this->pdo = $pdo;
    }

    // liste de tout les fiches
    public function index()
    {
        $fiches = $this->ficheModel->getAll();
        $pdo = $this->pdo;
        require 'views/fiche/index.php';
    }

    // creation fiche
    public function create(array $data)
    {
        $this->ficheModel->create($data);
        header('Location: index.php?gestion_fiche=1');
    }

    // modification fiche
    public function edit($id)
    {
        $user = $this->ficheModel->getById($id);
        require 'views/fiche/edit.php';
    }

    // validation modification fiche
    public function update(array $data)
    {
        $this->ficheModel->update($data);
        header('Location: index.php?gestion_fiche=1');
    }

    // suppression fiche par id fichie
    public function delete($id)
    {
        $user = $this->ficheModel->getById($id);
        require 'views/fiche/delete.php';
    }

    // confirmation suppression fiche par id fiche
    public function confirmDelete($id)
    {
        $this->ficheModel->delete($id);
        header('Location: index.php?gestion_fiche=1');
    }
}
?>
