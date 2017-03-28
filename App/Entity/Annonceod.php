<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 27/03/2017
 * Time: 09:49
 */

namespace App\Entity;


class Annonceod extends AnnonceGeneral
{
    private $id_annonceod;
    private $marque_annonce;
    private $etatmateriel_annonce;
    private $dateachat_annonce;
    private $garantie_annonce;
    private $idacheteur_annonce;
    private $prix_annonce;
    private $valide_annonce;
    private $id_annonce;
    private $id_categorie;
    private $id_type;
    private $id_typeexpedition;

    public function __construct(array $datas)
    {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId_annonceod()
    {
        return $this->id_annonceod;
    }

    /**
     * @return mixed
     */
    public function getMarque_annonce()
    {
        return $this->marque_annonce;
    }

    /**
     * @return mixed
     */
    public function getEtatmateriel_annonce()
    {
        return $this->etatmateriel_annonce;
    }

    /**
     * @return mixed
     */
    public function getDateachat_annonce()
    {
        return $this->dateachat_annonce;
    }

    /**
     * @return mixed
     */
    public function getGarantie_annonce()
    {
        return $this->garantie_annonce;
    }

    /**
     * @return mixed
     */
    public function getIdacheteur_annonce()
    {
        return $this->idacheteur_annonce;
    }

    /**
     * @return mixed
     */
    public function getPrix_annonce()
    {
        return $this->prix_annonce;
    }

    /**
     * @return mixed
     */
    public function getValide_annonce()
    {
        return $this->valide_annonce;
    }

    /**
     * @return mixed
     */
    public function getId_annonce()
    {
        return $this->id_annonce;
    }

    /**
     * @return mixed
     */
    public function getId_categorie()
    {
        return $this->id_categorie;
    }

    /**
     * @return mixed
     */
    public function getId_type()
    {
        return $this->id_type;
    }

    /**
     * @return mixed
     */
    public function getId_typeexpedition()
    {
        return $this->id_typeexpedition;
    }

    /**
     * @param mixed $id_annonceod
     */
    public function setId_annonceod($id_annonceod)
    {
        $this->id_annonceod = $id_annonceod;
    }

    /**
     * @param mixed $marque_annonce
     */
    public function setMarque_annonce($marque_annonce)
    {
        $this->marque_annonce = $marque_annonce;
    }

    /**
     * @param mixed $etatmateriel_annonce
     */
    public function setEtatmateriel_annonce($etatmateriel_annonce)
    {
        $this->etatmateriel_annonce = $etatmateriel_annonce;
    }

    /**
     * @param mixed $dateachat_annonce
     */
    public function setDateachat_annonce($dateachat_annonce)
    {
        $this->dateachat_annonce = $dateachat_annonce;
    }

    /**
     * @param mixed $garantie_annonce
     */
    public function setGarantie_annonce($garantie_annonce)
    {
        $this->garantie_annonce = $garantie_annonce;
    }

    /**
     * @param mixed $idacheteur_annonce
     */
    public function setIdacheteur_annonce($idacheteur_annonce)
    {
        $this->idacheteur_annonce = $idacheteur_annonce;
    }

    /**
     * @param mixed $prix_annonce
     */
    public function setPrix_annonce($prix_annonce)
    {
        $this->prix_annonce = $prix_annonce;
    }

    /**
     * @param mixed $valide_annonce
     */
    public function setValide_annonce($valide_annonce)
    {
        $this->valide_annonce = $valide_annonce;
    }

    /**
     * @param mixed $id_annonce
     */
    public function setId_annonce($id_annonce)
    {
        $this->id_annonce = $id_annonce;
    }

    /**
     * @param mixed $id_categorie
     */
    public function setId_categorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
    }

    /**
     * @param mixed $id_type
     */
    public function setId_type($id_type)
    {
        $this->id_type = $id_type;
    }

    /**
     * @param mixed $id_typeexpedition
     */
    public function setId_typeexpedition($id_typeexpedition)
    {
        $this->id_typeexpedition = $id_typeexpedition;
    }


}