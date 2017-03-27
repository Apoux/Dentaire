<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 13/03/2017
 * Time: 12:07
 */

namespace App\Model;

use App\Entity\Departement;
class DepartementRepository
{

    public function getAllDepartement() {
        $array = array();
        $req = SPDO::getInstance()->query('SELECT * FROM departement ORDER BY id_departement ASC');
        $datas = $req->fetchAll();
        foreach ($datas as $value){
            $string = $value['numero_departement'].' - '.$value['libelle_departement'];
            array_push($array,$string);
        }
        return $array;
    }
    public  function getDepartementByNumero($iddept){
        $req = SPDO::getInstance()->prepare('SELECT * FROM departement WHERE id_departement = '.$iddept.'');
        $req->execute();
        $res =$req->fetchAll();
        $iddept ="";
        //var_dump($res,$iddept);
        foreach ($res as $value){
            $iddept = $value['id_departement'];
        }
        return $iddept;
    }
}