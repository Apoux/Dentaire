<?php

/**
 * Created by PhpStorm.
 * User: AlexB
 * Date: 20/01/2017
 * Time: 09:30
 */
class annonceOD extends annonceGen
{
    private $marque_annonceOD;
    private $dateachat_annonceOD;
    private $etatmateriel_annonceOD;
    private $garantie_annonceOD;

    /**
     * @return mixed
     */
    public function getMarqueAnnonceOD()
    {
        return $this->marque_annonceOD;
    }

    /**
     * @param mixed $marque_annonceOD
     */
    public function setMarqueAnnonceOD($marque_annonceOD)
    {
        $this->marque_annonceOD = is_string($marque_annonceOD);
    }

    /**
     * @return mixed
     */
    public function getDateachatAnnonceOD()
    {
        return $this->dateachat_annonceOD;
    }

    /**
     * @param mixed $dateachat_annonceOD
     */
    public function setDateachatAnnonceOD($dateachat_annonceOD)
    {
        $this->dateachat_annonceOD = is_string($dateachat_annonceOD);
    }

    /**
     * @return mixed
     */
    public function getEtatmaterielAnnonceOD()
    {
        return $this->etatmateriel_annonceOD;
    }

    /**
     * @param mixed $etatmateriel_annonceOD
     */
    public function setEtatmaterielAnnonceOD($etatmateriel_annonceOD)
    {
        $this->etatmateriel_annonceOD = date($etatmateriel_annonceOD);
    }

    /**
     * @return mixed
     */
    public function getGarantieAnnonceOD()
    {
        return $this->garantie_annonceOD;
    }

    /**
     * @param mixed $garantie_annonceOD
     */
    public function setGarantieAnnonceOD($garantie_annonceOD)
    {
        $this->garantie_annonceOD = (bool)$garantie_annonceOD;
    }
}