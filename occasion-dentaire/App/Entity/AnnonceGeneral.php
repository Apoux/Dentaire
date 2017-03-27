<?php
/**
 * Created by PhpStorm.
 * User: vmoul
 * Date: 12/03/2017
 * Time: 16:10
 */

namespace App\Entity;


use App\Model\SPDO;

class AnnonceGeneral
{

    private $id_annonce;

    private $datecreation_annonce;

    private $description_annonce;

    private $dateexpiration_annonce;

    private $ipcreateur_annonce;

    private $id_personne;
    
    private $Personne;

    /**
     * Constructeur de l'annonces
     */
    public function __construct(array $datas)
    {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    public function getId_annonce()
    {
        return $this->id_annonce;
    }

    public function setId_annonce($id)
    {
        $this->id_annonce = $id;
    }

    /**
     * @return mixed
     */
    public function getDatecreation_annonce()
    {
        return $this->datecreation_annonce;
    }

    /**
     * @param mixed $datecreation_annonce
     */
    public function setDatecreation_annonce($datecreation_annonce)
    {
        $this->datecreation_annonce = $datecreation_annonce;
    }

    /**
     * @return mixed
     */
    public function getDescription_annonce()
    {
        return $this->description_annonce;
    }

    /**
     * @param mixed $description_annonce
     */
    public function setDescription_annonce($description_annonce)
    {
        $this->description_annonce = $description_annonce;
    }

    /**
     * @return mixed
     */
    public function getDateexpiration_annonce()
    {
        return $this->dateexpiration_annonce;
    }

    /**
     * @param mixed $dateexpiration_annonce
     */
    public function setDateexpiration_annonce($dateexpiration_annonce)
    {
        $this->dateexpiration_annonce = $dateexpiration_annonce;
    }

    /**
     * @return mixed
     */
    public function getIpcreateur_annonce()
    {
        return $this->ipcreateur_annonce;
    }

    /**
     * @param mixed $ipcreateur_annonce
     */
    public function setIpcreateur_annonce($ipcreateur_annonce)
    {
        $this->ipcreateur_annonce = $ipcreateur_annonce;
    }

    /**
     * @return mixed
     */
    public function getId_personne()
    {
        return $this->id_personne;
    }

    /**
     * @param mixed $id_personne
     */
    public function setId_personne($id_personne)
    {
        $this->id_personne = $id_personne;
    }



    public function getPersonne()
    {
        return $this->personne;
    }

    public function setPersonne($personne_id)
    {
        $req = SPDO::getInstance()->prepare('SELECT * FROM personne WHERE id_personne = :id');
        $req->execute(array(':id' => $personne_id));
        $res = $req->fetch(\PDO::FETCH_OBJ);
        $personne = new Personne($res->id_personne);
        $this->personne = $personne;
    }
}