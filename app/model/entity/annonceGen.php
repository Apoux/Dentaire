<?php

/**
 * Created by PhpStorm.
 * User: AlexB
 * Date: 20/01/2017
 * Time: 09:30
 */
class annonceGen
{
    private $id_annonceGen;
    private $datedebut_annonceGen;
    private $description_annonceGen;
    private $dateexpiration_annonceGen;

    /**
     * @return mixed
     */
    public function getIdAnnonceGen()
    {
        return $this->id_annonceGen;
    }

    /**
     * @param mixed $id_annonceGen
     */
    public function setIdAnnonceGen($id_annonceGen)
    {
        $this->id_annonceGen = (int) $id_annonceGen;
    }

    /**
     * @return mixed
     */
    public function getDatedebutAnnonceGen()
    {
        return $this->datedebut_annonceGen;
    }

    /**
     * @param mixed $datedebut_annonceGen
     */
    public function setDatedebutAnnonceGen($datedebut_annonceGen)
    {
        $this->datedebut_annonceGen = date($datedebut_annonceGen) ;
    }

    /**
     * @return mixed
     */
    public function getDescriptionAnnonceGen()
    {
        return $this->description_annonceGen;
    }

    /**
     * @param mixed $description_annonceGen
     */
    public function setDescriptionAnnonceGen($description_annonceGen)
    {
        $this->description_annonceGen = is_string($description_annonceGen);
    }

    /**
     * @return mixed
     */
    public function getDateexpirationAnnonceGen()
    {
        return $this->dateexpiration_annonceGen;
    }

    /**
     * @param mixed $dateexpiration_annonceGen
     */
    public function setDateexpirationAnnonceGen($dateexpiration_annonceGen)
    {
        $this->dateexpiration_annonceGen = date($dateexpiration_annonceGen);
    }
}