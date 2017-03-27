<?php
/**
 * Created by PhpStorm.
 * User: AlexB
 * Date: 05/01/2017
 * Time: 13:52
 */

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=chirdent;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
session_start();
