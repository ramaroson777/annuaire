<?php

class Categorie
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->getConnection()->prepare('SELECT * FROM categories');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->pdo->getConnection()->prepare('SELECT * FROM categories WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data)
    {
        $stmt = $this->pdo->getConnection()->prepare('INSERT INTO categories (libelle) VALUES (?)');
        $stmt->execute([$data['libelle']]);
    }

    public function update(array $data)
    {
        $stmt = $this->pdo->getConnection()->prepare("UPDATE categories SET libelle = ? WHERE id = ?");
        $stmt->execute([$data['libelle'], $data['id']]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->getConnection()->prepare('DELETE FROM categories WHERE id = ?');
        $stmt->execute([$id]);
    }

    public function getCategorieSelected($id_categorie)
    {
        $req = "SELECT * FROM categories WHERE id IN ($id_categorie)";
        $stmt = $this->pdo->getConnection()->prepare($req);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
