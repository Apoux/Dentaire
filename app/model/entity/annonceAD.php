<?php

/**
 * Created by PhpStorm.
 * User: AlexB
 * Date: 20/01/2017
 * Time: 09:30
 */
class annonceAD extends annonceGen
{
    private $assistante_annonceAD;
    private $secretaire_annonceAD;

    public function getAssistanteannonceAD()
    {
        return $this->assistante_annonceAD;
    }

    /**
     * @param mixed $assistante_annonceAD
     */
    public function setAssistanteannonceAD($assistante_annonceAD)
    {
        $this->assistante_annonceAD = (bool) $assistante_annonceAD;
    }

    /**
     * @return mixed
     */
    public function getSecretaireannonceAD()
    {
        return $this->secretaire_annonceAD;
    }

    /**
     * @param mixed $secretaire_annonceAD
     */
    public function setSecretaireannonceAD($secretaire_annonceAD)
    {
        $this->secretaire_annonceAD = (bool) $secretaire_annonceAD;
    }
}