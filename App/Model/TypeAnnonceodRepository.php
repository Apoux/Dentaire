<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 28/03/2017
 * Time: 14:38
 */
namespace App\Model;


class TypeAnnonceodRepository
{
    public function getAllTypeAnnonceod() {
        $array = array();
        $req = SPDO::getInstance()->query('SELECT * FROM typeannonceod ORDER BY id_type ASC');
        $datas = $req->fetchAll();
        foreach ($datas as $value){
            $string = $value['id_type'].' - '.$value['libelle_type'];
            array_push($array,$string);
        }
        return $array;
    }
}