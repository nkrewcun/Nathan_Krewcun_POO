<?php


class VoitureManager extends DbManager
{

    /**
     * VoitureManager constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function selectAll()
    {
        $voitures = [];
        $query = $this->pdo->prepare('SELECT * FROM voiture;');
        $query->execute();
        foreach ($query->fetchAll() as $row) {
            $voitures[] = new Voiture($row['marque'], $row['modele'], $row['energie'], $row['isAutomatic'], $row['image'], $row['id']);
        }
        return $voitures;
    }

    public function select($id)
    {
        $query = $this->pdo->prepare('SELECT * FROM voiture WHERE id = :id;');
        $query->execute(['id' => $id]);
        $row = $query->fetch();
        return new Voiture($row['marque'], $row['modele'], $row['energie'], $row['isAutomatic'], $row['image'], $row['id']);
    }

    public function insert(Voiture $voiture)
    {
        $query = $this->pdo->prepare('INSERT INTO voiture (marque, modele, energie, isAutomatic, image) VALUES (:marque, :modele, :energie, :isAutomatic, :image);');
        $query->execute([
            'marque' => $voiture->getMarque(),
            'modele' => $voiture->getModele(),
            'energie' => $voiture->getEnergie(),
            'isAutomatic' => $voiture->getIsAutomatic(),
            'image' => $voiture->getImage()
        ]);
        $voiture->setId($this->pdo->lastInsertId());
    }

    public function update(Voiture $voiture)
    {
        $query = $this->pdo->prepare('UPDATE voiture SET marque = :marque, modele = :modele, energie = :energie, isAutomatic = :isAutomatic, image = :image WHERE id = :id;');
        $query->execute([
            'marque' => $voiture->getMarque(),
            'modele' => $voiture->getModele(),
            'energie' => $voiture->getEnergie(),
            'isAutomatic' => $voiture->getIsAutomatic(),
            'image' => $voiture->getImage(),
            'id' => $voiture->getId()
        ]);
    }

    public function delete($id)
    {
        $query = $this->pdo->prepare('DELETE FROM voiture WHERE id = :id;');
        $query->execute(['id' => $id]);
    }
}
