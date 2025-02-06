<?php
class Fiche
{
    private $pdo;

    public function __construct(Database $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->getConnection()->query('SELECT * FROM fiches');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->pdo->getConnection()->prepare('SELECT * FROM fiches WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data)
    {
        $stmt = $this->pdo->getConnection()->prepare('INSERT INTO fiches (libelle,description,id_categorie) VALUES (?, ?, ?)');
        $stmt->execute([$data['libelle'], $data['description'], $data['id_categorie']]);
    }

    public function update(array $data)
    {
        $stmt = $this->pdo->getConnection()->prepare('UPDATE fiches SET libelle = ?, description = ?, id_categorie = ? WHERE id = ?');
        $stmt->execute([$data['libelle'], $data['description'], $data['id_categorie'], $data['id']]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->getConnection()->prepare('DELETE FROM fiches WHERE id = ?');
        $stmt->execute([$id]);
    }
}
?>
