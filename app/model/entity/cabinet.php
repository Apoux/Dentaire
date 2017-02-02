<?php

/**
 * Created by PhpStorm.
 * User: AlexB
 * Date: 05/01/2017
 * Time: 13:39
 */
class cabinet
{
    private $id_cabinet;
    private $nom_cabinet;
    private $anonymat_cabinet;
    private $modeexercices_cabinet;
    private $description_cabinet;
    private $specialite_cabinet;
    private $orientation_cabinet;
    private $secretaire_cabinet;
    private $assistante_cabinet;
    private $informatisation_cabinet;
    private $logiciel_cabinet;
    private $rvg_cabinet;
    private $radiographie_cabinet;
    private $autre_cabinet;

    /**
     * @return mixed
     */
    public function getIdCabinet()
    {
        return $this->id_cabinet;
    }

    /**
     * @param mixed $id_cabinet
     */
    public function setIdCabinet($id_cabinet)
    {
        $this->id_cabinet = (int) $id_cabinet;
    }

    /**
     * @return mixed
     */
    public function getNomCabinet()
    {
        return $this->nom_cabinet;
    }

    /**
     * @param mixed $nom_cabinet
     */
    public function setNomCabinet($nom_cabinet)
    {
        $this->nom_cabinet = is_string($nom_cabinet);
    }

    /**
     * @return mixed
     */
    public function getAnonymatCabinet()
    {
        return $this->anonymat_cabinet;
    }

    /**
     * @param mixed $anonymat_cabinet
     */
    public function setAnonymatCabinet($anonymat_cabinet)
    {
        $this->anonymat_cabinet = (bool)$anonymat_cabinet;
    }

    /**
     * @return mixed
     */
    public function getModeexercicesCabinet()
    {
        return $this->modeexercices_cabinet;
    }

    /**
     * @param mixed $modeexercices_cabinet
     */
    public function setModeexercicesCabinet($modeexercices_cabinet)
    {
        $this->modeexercices_cabinet = is_string($modeexercices_cabinet);
    }

    /**
     * @return mixed
     */
    public function getDescriptionCabinet()
    {
        return $this->description_cabinet;
    }

    /**
     * @param mixed $description_cabinet
     */
    public function setDescriptionCabinet($description_cabinet)
    {
        $this->description_cabinet = is_string($description_cabinet);
    }

    /**
     * @return mixed
     */
    public function getSpecialiteCabinet()
    {
        return $this->specialite_cabinet;
    }

    /**
     * @param mixed $specialite_cabinet
     */
    public function setSpecialiteCabinet($specialite_cabinet)
    {
        $this->specialite_cabinet = is_string($specialite_cabinet);
    }

    /**
     * @return mixed
     */
    public function getOrientationCabinet()
    {
        return $this->orientation_cabinet;
    }

    /**
     * @param mixed $orientation_cabinet
     */
    public function setOrientationCabinet($orientation_cabinet)
    {
        $this->orientation_cabinet = is_string($orientation_cabinet);
    }

    /**
     * @return mixed
     */
    public function getSecretaireCabinet()
    {
        return $this->secretaire_cabinet;
    }

    /**
     * @param mixed $secretaire_cabinet
     */
    public function setSecretaireCabinet($secretaire_cabinet)
    {
        $this->secretaire_cabinet = (bool) $secretaire_cabinet;
    }

    /**
     * @return mixed
     */
    public function getAssistanteCabinet()
    {
        return $this->assistante_cabinet;
    }

    /**
     * @param mixed $assistante_cabinet
     */
    public function setAssistanteCabinet($assistante_cabinet)
    {
        $this->assistante_cabinet = (bool) $assistante_cabinet;
    }

    /**
     * @return mixed
     */
    public function getInformatisationCabinet()
    {
        return $this->informatisation_cabinet;
    }

    /**
     * @param mixed $informatisation_cabinet
     */
    public function setInformatisationCabinet($informatisation_cabinet)
    {
        $this->informatisation_cabinet = (bool) $informatisation_cabinet;
    }

    /**
     * @return mixed
     */
    public function getLogicielCabinet()
    {
        return $this->logiciel_cabinet;
    }

    /**
     * @param mixed $logiciel_cabinet
     */
    public function setLogicielCabinet($logiciel_cabinet)
    {
        $this->logiciel_cabinet = is_string($logiciel_cabinet);
    }

    /**
     * @return mixed
     */
    public function getRvgCabinet()
    {
        return $this->rvg_cabinet;
    }

    /**
     * @param mixed $rvg_cabinet
     */
    public function setRvgCabinet($rvg_cabinet)
    {
        $this->rvg_cabinet = (bool) $rvg_cabinet;
    }

    /**
     * @return mixed
     */
    public function getRadiographieCabinet()
    {
        return $this->radiographie_cabinet;
    }

    /**
     * @param mixed $radiographie_cabinet
     */
    public function setRadiographieCabinet($radiographie_cabinet)
    {
        $this->radiographie_cabinet = is_string($radiographie_cabinet);
    }

    /**
     * @return mixed
     */
    public function getAutreCabinet()
    {
        return $this->autre_cabinet;
    }

    /**
     * @param mixed $autre_cabinet
     */
    public function setAutreCabinet($autre_cabinet)
    {
        $this->autre_cabinet = is_string($autre_cabinet);
    }


}