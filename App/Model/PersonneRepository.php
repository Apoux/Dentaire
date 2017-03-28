<?php
/**
 * Created by PhpStorm.
 * User: vmoul
 * Date: 08/03/2017
 * Time: 23:06
 */

namespace App\Model;


class PersonneRepository
{

    public function getUserId(){
        if($this->islogged()){
            return $_SESSION['user_id'];
        }
        return false;
    }
    public function register($email, $password, $password_verif, $nom, $prenom,$ddn,$civilite,$iddept,$idtype,$ville,$pays,$telephone,$mobile,$fax) {
        $req = SPDO::getInstance()->prepare('SELECT * FROM personne WHERE mail_utilisateur = "'.$email.'"');
        $req->execute();
        $res = $req->rowCount();
        /**
         * var_dump($email,$password, $password_verif, $nom, $prenom,$civilite);
         * var_dump($res);
         * var_dump($req);
         **/
        if($res == 0){
            if($password === $password_verif) {
                $password = sha1($password);
                $req = SPDO::getInstance()->prepare('INSERT INTO personne (mail_utilisateur, mdp_utilisateur, nom_personne, prenom_personne,ddn_personne,civilite_personne,id_type,id_departement,ville_personne,pays_personne,telephone_personne,mobile_personne,fax_personne) 
VALUES(:email, :password, :nom, :prenom,:ddn,:civilite,:idtype,:iddept,:ville,:pays,:tel,:mobile,:fax)');
                $req->bindParam(':email', $email);
                $req->bindParam(':password', $password);
                $req->bindParam(':nom', $nom);
                $req->bindParam(':prenom', $prenom);
                $req->bindValue(':ddn',$ddn);
                $req->bindValue(':civilite',$civilite);
                $req->bindValue(':iddept',$iddept);
                $req->bindValue(':idtype',$idtype);
                $req->bindValue(':ville',$ville);
                $req->bindValue(':pays',$pays);
                $req->bindValue(':tel',$telephone);
                $req->bindValue(':mobile',$mobile);
                $req->bindValue(':fax',$fax);
                $req->execute();
                $error = 'Compte correctement enregistré !';
                return $error;
            } else {
                $error = 'Vos mots de passes sont différents.';
                return $error;
            }
        } elseif($res == 1) {
            $error = 'Email déjà utilisé.';
            return $error;
        } else {
            $error = 'Erreur inconnue.. Contactez l\'Administrateur !';
            return $error;
        }
    }
    public function login($email, $password) {
        $req = SPDO::getInstance()->prepare('SELECT * FROM personne WHERE mail_utilisateur = :email');
        $req->execute(array(':email' => $email));
        $user = $req->fetch(\PDO::FETCH_OBJ);
        if($user){
             if ($user->mdp_utilisateur == sha1($password)){
                 $this->saveSession($user->id_personne);
                 return true;
            }
        }
        return false;
    }
    public function addLivrasion($adresse,$ville,$cp,$pays,$idpersonne){
        if ($this->selectLivraisonById()==false){
            $req = SPDO::getInstance()->prepare('INSERT INTO adresselivraison(adresse_livraison,ville_livraison,cp_livraison,pays_livraison,id_personne)VALUES(:adresse,:ville,:cp,:pays,:idpersonne)');
            $req->bindValue(':adresse',$adresse);
            $req->bindValue(':ville',$ville);
            $req->bindValue(':cp',$cp);
            $req->bindValue(':pays',$pays);
            $req->bindValue(':idpersonne',$idpersonne);
            $req->execute();
            $error = 'Adresse de livraison correctement enregistré !';
            return $error;
        }else{
            $alreadyexist = $this->selectLivraisonById($this->getUserId());
            $idlivraison = $alreadyexist->id_livraison;
            $reqUpdate = SPDO::getInstance()->prepare('UPDATE adresselivraison SET adresse_livraison = :adresse,ville_livraison = :ville,cp_livraison = :cp, pays_livraison = :pays WHERE id_livraison = :idlivraison');
            $reqUpdate->bindValue(':adresse',$adresse);
            $reqUpdate->bindValue(':ville',$ville);
            $reqUpdate->bindValue(':cp',$cp);
            $reqUpdate->bindValue(':pays',$pays);
            $reqUpdate->bindValue(':idlivraison',$idlivraison);
            $reqUpdate->execute();
            $error = 'Adresse de livraison correctement modifié !';
            return $error;
        }
    }
    public function selectLivraisonById(){
        $req =SPDO::getInstance()->prepare('SELECT * FROM adresselivraison WHERE id_personne = :idpersonne');
        $req->bindValue(':idpersonne',$this->getUserId());
        $req->execute();
        if ($req->rowCount()==1){
            $adresselivraison = $req->fetch(\PDO::FETCH_OBJ);
            return $adresselivraison;
        }else{
            return false;
        }
    }

    public function infoUser($id){
        $req = SPDO::getInstance()->prepare('SELECT * FROM personne WHERE id_personne =:idpersonne');
        $req->bindValue(':idpersonne',$id);
        $req->execute();
        $user = $req->fetch(\PDO::FETCH_OBJ);
        return $user;
    }
    public function modifInfoUser($adresse,$cp,$ville,$pays,$tel,$mobile,$fax,$idtype,$iddept,$iduser){
        $req = SPDO::getInstance()->prepare('UPDATE personne 
        SET adresse_personne = :adresse, codepostal_personne = :cp, `ville_personne` = :ville,pays_personne = :pays, telephone_personne = :tel, mobile_personne = :mobile, fax_personne = :fax,id_departement= :iddept,id_type =:idtype WHERE personne.id_personne = :iduser');
        $req->bindValue(':adresse',$adresse);
        $req->bindValue(':cp',$cp);
        $req->bindValue(':ville',$ville);
        $req->bindValue(':pays',$pays);
        $req->bindValue(':tel',$tel);
        $req->bindValue(':mobile',$mobile);
        $req->bindValue(':fax',$fax);
        $req->bindValue(':iduser',$iduser);
        $req->bindValue(':iddept',$iddept);
        $req->bindValue(':idtype',$idtype);
        $req->execute();
        $error = "Informations de votre profil modifiés";
        return $error;
    }
    public function modifPassUser($pass,$iduser){
        $req = SPDO::getInstance()->prepare('UPDATE personne SET mdp_utilisateur=:pass WHERE id_personne = :iduser');
        $req->bindValue(':pass',$pass);
        $req->bindValue(':iduser',$iduser);
        $req->execute();
        $error ="Mot de passe modifié";
        return $error;
    }

    public function saveSession($id) {
        $_SESSION['user_id'] = $id;
    }


    public function saveSessionAdmin($id, $role) {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_role'] = $role;
    }

    public function islogged(){
        if(isset($_SESSION['user_id'])) {
            return true;
        }
    }

    public function isloggedAdmin(){
        if(isset($_SESSION['user_id']) and isset($_SESSION['user_role']) == 'ROLE_ADMIN') {
            return true;
        }
    }

    public static function logged() {
        if(isset($_SESSION['user_id'])) {
            return true;
        }
    }

    public static function loggedAdmin() {
        if(isset($_SESSION['user_id']) and isset($_SESSION['user_role']) == 'ROLE_ADMIN') {
            return true;
        }
    }

}