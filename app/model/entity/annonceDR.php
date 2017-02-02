<?php

/**
 * Created by PhpStorm.
 * User: AlexB
 * Date: 20/01/2017
 * Time: 09:33
 */
class annonceDR extends annonceGen
{
    private $dateFinRemplacement_annonceDR;
    private $deuxiemefauteuil_annonceDR;
    private $assistante_annonceDR;
    private $secretaire_annonceDR;
    private $logement_annonceDR;
    private $remarques_annonceDR;


    /**
     * @return mixed
     */
    public function getDeuxiemefauteuilannonceDR()
    {
        return $this->deuxiemefauteuil_annonceDR;
    }

    /**
     * @param mixed $deuxiemefauteuil_annonceDR
     */
    public function setDeuxiemefauteuilannonceDR($deuxiemefauteuil_annonceDR)
    {
        $this->deuxiemefauteuil_annonceDR = (bool) $deuxiemefauteuil_annonceDR;
    }

    /**
     * @return mixed
     */
    public function getDateFinRemplacementannonceDR()
    {
        return $this->dateFinRemplacement_annonceDR;
    }

    /**
     * @param mixed $dateFinRemplacement_annonceDR
     */
    public function setDateFinRemplacementannonceDR($dateFinRemplacement_annonceDR)
    {
        $this->dateFinRemplacement_annonceDR = date($dateFinRemplacement_annonceDR);
    }

    /**
     * @return mixed
     */
    public function getAssistanteannonceDR()
    {
        return $this->assistante_annonceDR;
    }

    /**
     * @param mixed $assistante_annonceDR
     */
    public function setAssistanteannonceDR($assistante_annonceDR)
    {
        $this->assistante_annonceDR = (bool)$assistante_annonceDR;
    }

    /**
     * @return mixed
     */
    public function getSecretaireannonceDR()
    {
        return $this->secretaire_annonceDR;
    }

    /**
     * @param mixed $secretaire_annonceDR
     */
    public function setSecretaireannonceDR($secretaire_annonceDR)
    {
        $this->secretaire_annonceDR = $secretaire_annonceDR;
    }

    /**
     * @return mixed
     */
    public function getLogementannonceDR()
    {
        return $this->logement_annonceDR;
    }

    /**
     * @param mixed $logement_annonceDR
     */
    public function setLogementannonceDR($logement_annonceDR)
    {
        $this->logement_annonceDR = $logement_annonceDR;
    }

    /**
     * @return mixed
     */
    public function getRemarquesannonceDR()
    {
        return $this->remarques_annonceDR;
    }

    /**
     * @param mixed $remarques_annonceDR
     */
    public function setRemarquesannonceDR($remarques_annonceDR)
    {
        $this->remarques_annonceDR = $remarques_annonceDR;
    }
}