<?php

/**
 * Created by PhpStorm.
 * User: AlexB
 * Date: 20/01/2017
 * Time: 09:30
 */
class categorie
{
    private $id_categorie;
    private $libelle_categorie;

    /**
     * @return mixed
     */
    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    /**
     * @param mixed $id_categorie
     */
    public function setIdCategorie($id_categorie)
    {
        $this->id_categorie = (int) $id_categorie;
    }

    /**
     * @return mixed
     */
    public function getLibelleCategorie()
    {
        return $this->libelle_categorie;
    }

    /**
     * @param mixed $libelle_categorie
     */
    public function setLibelleCategorie($libelle_categorie)
    {
        $this->libelle_categorie = is_string($libelle_categorie);
    }
}