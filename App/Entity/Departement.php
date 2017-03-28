<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 13/03/2017
 * Time: 12:08
 */

namespace App\Entity;


class Departement
{
    private $id;
    private $numero;
    private $libelle;
    private $idregion;

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
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getIdregion()
    {
        return $this->idregion;
    }

    /**
     * @param mixed $idregion
     */
    public function setIdregion($idregion)
    {
        $this->idregion = $idregion;
    }

}