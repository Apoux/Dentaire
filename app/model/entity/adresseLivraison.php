<?php

/**
 * Created by PhpStorm.
 * User: AlexB
 * Date: 01/02/2017
 * Time: 16:32
 */
class adresseLivraison
{
    private $id_livraison;
    private $adresse_livraison;
    private $ville_livraison;
    private $cp_livraison;
    private $pays_livraison;

    public function setid_livraison($id_livraiso)
    {
        $this->id_livraison = (int)$id_livraiso;
    }

    public function getid_livraison()
    {
        return $this->id_livraison;
    }

    public function setadresse_livraison($adresse_livraiso)
    {
        if (is_string($adresse_livraiso)) {
            $this->adresse_livraison = $adresse_livraiso;
        }

    }

    public function getadresse_livraison()
    {
        return $this->adresse_livraison;
    }

    public function setville_livraison($ville_livraiso)
    {
        if (is_string($ville_livraiso)) {
            $this->ville_livraison = $ville_livraiso;
        }

    }

    public function getville_livraison()
    {
        return $this->ville_livraison;
    }

    public function setcp_livraison($cp_livraiso)
    {
        $cp_livraiso = (int)$cp_livraiso;

        if (is_string($cp_livraiso)) {
            $this->cp_livraison = $cp_livraiso;
        }
    }

    public function getcp_livraison()
    {
        return $this->cp_livraison;
    }
    public function setpays_livraison($pays_livraiso)
    {
        $pays_livraiso = (int)$pays_livraiso;

        if (is_string($pays_livraiso)) {
            $this->pays_livraison = $pays_livraiso;
        }
    }

    public function getpays_livraison()
    {
        return $this->cp_livraison;
    }

}
