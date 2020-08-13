<?php


class Voiture
{
    private $id;
    private $marque;
    private $modele;
    private $energie;
    private $isAutomatic;
    private $image;

    /**
     * Voiture constructor.
     * @param $id
     * @param $marque
     * @param $modele
     * @param $energie
     * @param $isAutomatic boolean
     * @param $image
     */
    public function __construct($marque, $modele, $energie, $isAutomatic, $image = null, $id = null)
    {
        $this->id = $id;
        $this->marque = $marque;
        $this->modele = $modele;
        $this->energie = $energie;
        $this->isAutomatic = $isAutomatic;
        $this->image = $image;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed|null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @param mixed $marque
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    /**
     * @return mixed
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * @param mixed $modele
     */
    public function setModele($modele)
    {
        $this->modele = $modele;
    }

    /**
     * @return mixed
     */
    public function getEnergie()
    {
        return $this->energie;
    }

    /**
     * @param mixed $energie
     */
    public function setEnergie($energie)
    {
        $this->energie = $energie;
    }

    /**
     * @return bool
     */
    public function getIsAutomatic()
    {
        return $this->isAutomatic;
    }

    /**
     * @param bool $isAutomatic
     */
    public function setIsAutomatic($isAutomatic)
    {
        $this->isAutomatic = $isAutomatic;
    }

    /**
     * @return mixed|null
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed|null $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
}
