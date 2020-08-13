<?php


class VoitureController
{
    private $voitureManager;

    /**
     * VoitureController constructor.
     */
    public function __construct()
    {
        $this->voitureManager = new VoitureManager();
    }

    public function getAll()
    {
        $voitures = $this->voitureManager->selectAll();

        require 'view/voitures_view.php';
    }

    public function get($id)
    {
        $voiture = $this->voitureManager->select($id);

        require 'view/voiture_view.php';
    }

    public function displayAddForm()
    {
        require 'view/add_voiture.php';
    }

    public function insert()
    {
        $voiture = new Voiture($_POST['marque'], $_POST['modele'], $_POST['energie'], $_POST['isAutomatic']);
        $image = $_FILES['image'];
        $errors = $this->validForm($voiture, $image);
        if (!count($errors)) {
            if ($image['error'] === 0) {
                $voiture->setImage($this->uploadImage($image, null));
            }
            $this->voitureManager->insert($voiture);
            header('Location: index.php');
        } else {
            require 'view/add_voiture.php';
        }
    }

    public function displayEditForm($id)
    {
        $voiture = $this->voitureManager->select($id);

        require 'view/edit_voiture.php';
    }

    public function update($id)
    {
        $voiture = $this->voitureManager->select($id);
        $voiture->setMarque($_POST['marque']);
        $voiture->setModele($_POST['modele']);
        $voiture->setEnergie($_POST['energie']);
        $voiture->setIsAutomatic($_POST['isAutomatic']);
        $image = $_FILES['image'];
        $errors = $this->validForm($voiture, $image);
        if (!count($errors)) {
            if ($image['error'] === 0) {
                $voiture->setImage($this->uploadImage($image, $voiture->getImage()));
            }
            $this->voitureManager->update($voiture);
            header('Location: index.php');
        } else {
            require 'view/edit_voiture.php';
        }
    }

    public function delete($id)
    {
        $voiture = $this->voitureManager->select($id);
        $this->voitureManager->delete($id);
        unlink('uploads/images/' . $voiture->getImage());
        header('Location: index.php');
    }

    private function validForm(Voiture $voiture, $image)
    {
        $errors = [];
        if (empty($voiture->getMarque())) {
            $errors[] = 'La marque est requise';
        }
        if (empty($voiture->getModele())) {
            $errors[] = 'Le modèle est requis';
        }
        $energies = ['Essence', 'Diesel', 'Électrique', 'Hybride'];
        if (!in_array($voiture->getEnergie(), $energies, true)) {
            $errors[] = 'Le type d\'énergie est requis';
        }
        if ($voiture->getIsAutomatic() !== '0' && $voiture->getIsAutomatic() !== '1' ) {
            $errors[] = 'Le type de transmission est requis';
        }
        $imageError = $this->validImage($image);
        if ($imageError) {
            $errors[] = $imageError;
        }
        return $errors;
    }

    private function validImage($image)
    {
        $error = '';
        if (isset($image) && $image['error'] === 0) {
            if ($image['size'] <= 1000000) {
                $extensionFile = $image['type'];
                $authorizedExtensions = ['image/jpeg', 'image/png', 'image/gif'];
                if (!in_array($extensionFile, $authorizedExtensions)) {
                    $error = 'Je n\'accepte que des images';
                }
            } else {
                $error = 'le fichier est trop lourd pour un petit serveur ... ';
            }
        }
        return $error;
    }

    private function uploadImage($image, $voitureImage)
    {
        if (!$voitureImage) {
            $voitureImage = uniqid() . '.' . pathinfo($image['name'])['extension'];
        }
        move_uploaded_file($image['tmp_name'], 'uploads/images/' . $voitureImage);
        return $voitureImage;
    }
}
