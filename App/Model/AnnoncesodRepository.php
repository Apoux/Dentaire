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
    public function getAnnonceOD($id)
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
    public function addAnnonceGeneral($datecreation,$description,$dateexpiration,$ip,$idpersonne){
        $req =SPDO::getInstance()->prepare('INSERT INTO annoncegeneral(datecreation_annonce,description_annonce,dateexpiration_annonce,ipcreateur_annonce,id_personne)
 VALUES(:datecreation,:description,:dateexpiration,:ipcreateur,:idpersonne)');

        $req->bindValue(':datecreation',$datecreation);
        $req->bindValue(':description',$description);
        $req->bindValue(':dateexpiration',$dateexpiration);
        $req->bindValue(':ipcreateur',$ip);
        $req->bindValue(':idpersonne',$idpersonne);
        $req->execute();
        $lastId = SPDO::getInstance()->lastInsertId();
        return $lastId;

    }
    public function addAnnonceOd($marque,$etat,$dateachat,$garantie,$idacheteur,$prix,$vendu,$valide,$proposition,$idannonce,$idcat,$idtype,$idtypeexpedition){
        $req = SPDO::getInstance()->prepare('INSERT INTO annonceod(marque_annonce,etatmateriel_annonce,dateachat_annonce,garantie_annonce,idacheteur_annonce,prix_annonce,vendu_annonce,valide_annonce,proposition_annonce,id_annonce,id_categorie,id_type,id_typeexpedition)
VALUES (:marque,:etat,:dateachat,:garantie,:idacheteur,:prix,:vendu,:valide,:propostition,:idannonce,idcategorie,idtype,idtypeexpedition)');
        $req->bindValue(':marque',$marque);
        $req->bindValue(':etat',$etat);
        $req->bindValue(':dateachat',$dateachat);
        $req->bindValue(':garantie',$garantie);
        $req->bindValue(':idacheteur',$idacheteur);
        $req->bindValue(':prix',$prix);
        $req->bindValue(':vendu',$vendu);
        $req->bindValue(':valide',$valide);
        $req->bindValue(':proposition',$proposition);
        $req->bindValue(':idannonce',$idannonce);
        $req->bindValue(':idcategorie',$idcat);
        $req->bindValue(':idtype',$idtype);
        $req->bindValue(':idtypeexpedition',$idtypeexpedition);
        $req->execute();
    }
}