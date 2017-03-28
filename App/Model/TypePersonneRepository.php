<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 14/03/2017
 * Time: 10:38
 */

namespace App\Model;


class TypePersonneRepository
{
    public function getAllTypePersonne() {
        $array = array();
        $req = SPDO::getInstance()->query('SELECT * FROM typepersonne ORDER BY id_type ASC');
        $datas = $req->fetchAll();
        foreach ($datas as $value){
            $string = $value['id_type'].' - '.$value['id_libelle'];
            array_push($array,$string);
        }
        return $array;
    }
    public  function getDepartementByIdType($idtype){
        $req = SPDO::getInstance()->prepare('SELECT * FROM typepersonne WHERE id_type = '.$idtype.'');
        $req->execute();
        $res =$req->fetchAll();
        $id ="";
        foreach ($res as $value){
            $id= $value['id_type'];
            $idtype = $id;
        }
        return $idtype;
    }
}