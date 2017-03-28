<?php

namespace App\Controller;

use App\Entity\User;
use App\Model\DepartementRepository;
use App\Model\PersonneRepository;
use App\Model\TypePersonneRepository;
use App\Model\UserRepository;
use Core\Controller\Controller;
use Core\HTML\TemplateForm;


class PersonneController extends Controller
{
    public function login() {
        $this->template = 'default';
        $error = ' ';
        $personnerepo = new PersonneRepository();
        if(!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if($personnerepo->login($email, $password)) {
                header('Location: '.PATH.'/personne/profil');
            } else {
                $error = 'Mauvais mail/mot de passe !';
            }
        }
        $form = new TemplateForm($_POST);
        $this->render('User/login', compact('form', 'User', 'error'));
    }
    public function register() {
        $this->template = 'default';
        $personnerepo = new PersonneRepository();
        $deptrepo = new DepartementRepository();
        $typepersonnerepo = new TypePersonneRepository();
        $listeType = $typepersonnerepo->getAllTypePersonne();
        $listeCP =$deptrepo->getAllDepartement();
        $error = ' ';
        if($personnerepo->islogged()){
            $this->denied();
        }
        if(!empty($_POST)) {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $password_verif = htmlspecialchars($_POST['password_verif']);
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $ddn = htmlspecialchars($_POST['ddn']);
            $civilite = htmlspecialchars($_POST['civilite']);
            $idtype = htmlspecialchars($_POST['typepersonne']);
            $idtype++;
            $iddept = htmlspecialchars($_POST['departement']);
            $iddept++;
            $ville = htmlspecialchars($_POST['cp']);
            $pays = htmlspecialchars($_POST['pays']);
            $telephone = htmlspecialchars($_POST['telephone']);
            $mobile = htmlspecialchars($_POST['mobile']);
            $fax = htmlspecialchars($_POST['fax']);
            $error = $personnerepo->register($email, $password, $password_verif, $nom, $prenom,$ddn,$civilite,$iddept,$idtype,$ville,$pays,$telephone,$mobile,$fax);
        }
        $form = new TemplateForm($_POST);
        $this->render('User/register', compact('listeType','listeCP','form', 'error'));
    }
    public function logout() {
        session_destroy();
        unset($_SESSION['user_id']);
        header('Location: '.PATH.'/home/index');
    }
    public function profil() {
        $this->template = 'default';
        $personnerepo = new PersonneRepository();
        $deptrepo = new DepartementRepository();
        $typepersonnerepo = new TypePersonneRepository();
        $listeDept =$deptrepo->getAllDepartement();
        $listeType = $typepersonnerepo->getAllTypePersonne();
        $error=' ';
        if(!$personnerepo->islogged()){
            $this->denied();
        }
        $user = $personnerepo->infoUser($personnerepo->getUserId());
        $form = new TemplateForm($_POST);
        if(!empty($_POST)){
            $adresse = htmlspecialchars($_POST['adresse']);
            $cp = htmlspecialchars($_POST['cp']);
            $ville = htmlspecialchars($_POST['ville']);
            $pays = htmlspecialchars($_POST['pays']);
            $tel= htmlspecialchars($_POST['tel']);
            $mobile= htmlspecialchars($_POST['mobile']);
            $fax= htmlspecialchars($_POST['fax']);

            $idtype = htmlspecialchars($_POST['type']);
            $idtype++;
            $iddept = htmlspecialchars($_POST['dept']);
            $iddept++;

            $error = $personnerepo->modifInfoUser($adresse,$cp,$ville,$pays,$tel,$mobile,$fax,$idtype,$iddept,$personnerepo->getUserId());
        }
        $this->render('User/profil', compact('user','form','formDeux','error','listeDept','listeType'));
    }
    public function modifpass(){
        $this->template = 'default';
        $personnerepo = new PersonneRepository();
        $user = $personnerepo->infoUser($personnerepo->getUserId());
        $error=' ';
        if(!$personnerepo->islogged()){
            $this->denied();
        }
        if (!empty($_POST)){
            $pass = htmlspecialchars($_POST['password']);
            $passverif = htmlspecialchars($_POST['passwordverif']);
            if ($pass == $passverif){
                $pass =sha1($pass);
                $personnerepo->modifPassUser($pass,$personnerepo->getUserId());
                $error="Votre mot de passe à été modifié";

            }
            else{
                $error="Vos mot de passe sont différents";
            }
        }
        $form = new TemplateForm($_POST);
        $this->render('User/modifpass', compact('user','form','error'));
    }
    public function livraison(){
        $this->template = 'default';
        $personnerepo = new PersonneRepository();        $error = ' ';
        $form = new TemplateForm($_POST);
        if(!$personnerepo->islogged()){
            $this->denied();
        }
        if ($personnerepo->selectLivraisonById()== false){

        }else{
            $infoLivraison =$personnerepo->selectLivraisonById();
        }
        if(!empty($_POST)){
            $adresse = htmlspecialchars($_POST['adresse']);
            $ville = htmlspecialchars($_POST['ville']);
            $cp = htmlspecialchars($_POST['cp']);
            $pays = htmlspecialchars($_POST['pays']);
            $error = $personnerepo->addLivrasion($adresse,$ville,$cp,$pays,$personnerepo->getUserId());
        }

        $this->render('User/livraison', compact('form','error','infoLivraison'));
    }

}