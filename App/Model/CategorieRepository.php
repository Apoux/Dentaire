<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 28/03/2017
 * Time: 14:52
 */

namespace App\Model;


class CategorieRepository
{

    public function getAllCategorie() {
        $array = array();
        $req = SPDO::getInstance()->query('SELECT * FROM categorie ORDER BY id_categorie ASC');
        $datas = $req->fetchAll();
        foreach ($datas as $value){
            $string = $value['id_categorie'].' - '.$value['libelle_categorie'];
            array_push($array,$string);
        }
        return $array;
    }
}