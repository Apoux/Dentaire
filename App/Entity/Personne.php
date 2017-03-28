<?php

namespace App\Entity;

use App\Model\SPDO;

class Personne
{
    private $id;
    private $email;
    private $password;
    private $civilite;
    private $nom;
    private $prenom;
    private $ddn;
    private $adresse;
    private $codepostal;
    private $ville;
    private $pays;
    private $telephone;
    private $mobile;
    private $fax;
    private $iddept;
    private $idlivraison;
    private $idtype;

    private $pseudo;

    /**
     * User constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $stmt = SPDO::getInstance()->query('SELECT * FROM personne WHERE id_personne = '. $id);
        $res = $stmt->fetch(\PDO::FETCH_OBJ);
        if($res == true) {
            $this->id = $res->id_personne;
            $this->email = $res->mail_utilisateur;
            $this->password = $res->mdp_utilisateur;
            $this->civilite = $res->civilite_personne;
            $this->nom = $res->nom_personne;
            $this->prenom = $res->prenom_personne;
            $this->ddn = $res->ddn_personne;
            $this->adresse = $res->adresse_personne;
            $this->codepostal = $res->codepostal_personne;
            $this->ville = $res->ville_personne;
            $this->pays = $res->pays_personne;
            $this->telephone = $res->telephone_personne;
            $this->mobile = $res->mobile_personne;
            $this->fax = $res->fax_personne;
            $this->iddept = $res->id_departement;
            $this->idlivraison = $res->id_livraison;
            $this->idtype = $res->id_type;
        }
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        $stmt = SPDO::getInstance()->query('SELECT * FROM adresse WHERE id = ' .$this->adresse );
        $res = $stmt->fetch(\PDO::FETCH_OBJ);
        if($res) {
            $adresse = new Adresse();
            $adresse->setVille($res->ville);
            $adresse->setCp($res->cp);
            return $adresse;
        }

        return false;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getDdn()
    {
        return $this->ddn;
    }

    /**
     * @param mixed $ddn
     */
    public function setDdn($ddn)
    {
        $this->ddn = $ddn;
    }

    /**
     * @return mixed
     */

    public function getPseudo()
    {
        $this->setPseudo();
        return $this->pseudo;
    }


    public function setPseudo()
    {
        $pseudo =substr($this->getPrenom(),0,3).$this->getId();
        $pseudo =strtolower($pseudo);
        $pseudo = ucfirst($pseudo);
        $this->pseudo = $pseudo;
    }


}