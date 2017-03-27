<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 27/03/2017
 * Time: 09:53
 */

namespace App\Model;


use App\Entity\Annonceod;

class AnnoncesodRepository
{

    public function getAllAnnoncesOD($start,$nbitem) {
        $req = SPDO::getInstance()->prepare('SELECT * FROM `annonceod` INNER JOIN annoncegeneral ON annonceod.`id_annonce` = annoncegeneral.id_annonce WHERE valide_annonce = 1 LIMIT '.$start.','.$nbitem.'');
        $req->execute();
        $datas =$req->fetchAll();
        $array = array();
        foreach ($datas as $key => $data) {

            $annonce = new Annonceod($data);
            $annonce->setPersonne($data['id_personne']);
            $array[$key] = $annonce;
        }
        return $array;
    }
    public function countAllAnnoncesOD(){
        $req = SPDO::getInstance()->prepare('SELECT * FROM `annonceod` INNER JOIN annoncegeneral ON annonceod.`id_annonce` = annoncegeneral.id_annonce WHERE valide_annonce = 1');
        $req->execute();
        $nbitems =$req->rowCount();
        return $nbitems;
    }
    public function getAnnonceod($id)
    {
        $req = SPDO::getInstance()->prepare('SELECT * FROM annonceod INNER JOIN annoncegeneral ON annonceod.`id_annonce` = annoncegeneral.id_annonce WHERE id_annonceod = "' . $id . '"');
        $req->execute();
        $data = $req->fetch();
        if ($data) {
            $annonce = new Annonceod($data);
            $annonce->setPersonne($data['id_personne']);
            return $annonce;
        } else {
            return false;
        }
    }
}