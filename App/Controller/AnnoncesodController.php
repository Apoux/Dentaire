<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 27/03/2017
 * Time: 10:00
 */

namespace App\Controller;


use App\Model\AnnonceodRepository;
use App\Model\AnnoncesodRepository;
use App\Model\CategorieRepository;
use App\Model\PersonneRepository;
use App\Model\typeAnnonceodRepository;
use Core\Controller\Controller;
use Core\HTML\TemplateForm;


class AnnoncesodController extends Controller
{
    public function index() {
        $this->template = 'default';
        $start = 1;
        $par_page=10;
        $annoncesodrepo = new AnnoncesodRepository();
        $nbitems = $annoncesodrepo->countAllAnnoncesOD();
        $nbitems = $nbitems / $par_page;


        if(isset($_GET['page'])){
            $page =$_GET['page'];
            $start = $par_page * $page;
            $start = $start -1;

        }else{
            $start= 0;
            $page =1;
        }
        $annonces =  $annoncesodrepo->getAllAnnoncesOD($start,$par_page);
        $this->render('Annoncesod/index', compact('annonces','nbitems','page'));
    }

    public function view_annonce() {
        $this->template = 'default';
        $annoncesodrepo = new AnnoncesodRepository();
        if(isset($_GET['id'])) {
            $annonce = $annoncesodrepo->getAnnonceOD($_GET['id']);
            if ($annonce) {
                $this->render('Annoncesod/view_annonce', compact('annonce'));
            } else {
                $this->render('Error/nothing');
            }
        }   else {
            $this->render('Error/404');
        }
    }
    public function add_annonce(){
        $this->template = 'default';
        $personnerepo = new PersonneRepository();
        $annonceodrepo = new AnnoncesodRepository();
        $categorierepo = new CategorieRepository();
        $idpersonne = $personnerepo->getUserId();
        $form = new TemplateForm($_POST);
        $error = ' ';
        $suite = 0 ;
        $typeannoncerepo = new TypeAnnonceodRepository();
        $listeType = $typeannoncerepo->getAllTypeAnnonceod();
        $listeCategorie = $categorierepo->getAllCategorie();
        if(!$personnerepo->islogged()){
            $this->denied();
        }
         if(!empty($_POST['description'])) {
            if($_POST['description']!="description"){
                $description = htmlspecialchars($_POST['description']);
                $choix = htmlspecialchars($_POST['choix']);
                $datecreation = date('Y-m-d h:i:s');
                $dateexpiration = date('Y-m-d',strtotime('+ '.$choix .'month',strtotime($datecreation)));
                $ip = $_SERVER["REMOTE_ADDR"];
                $suite =1;
                $error="etape suivante";
                if($suite ==1){
                    if(!empty($_POST['type'])){
                        $lastid =$annonceodrepo->addAnnonceGeneral($datecreation,$description,$dateexpiration,$ip,$idpersonne);
                        $error="Veuillez remplir tout les dwdasaddadwdw";
                        $suite =2;
                    }else{
                        $error="Veuillez remplir tout les dwdwdw";
                    }
                }

            }else{
                $error="Veuillez remplir une description";
            }
        }

        $form = new TemplateForm($_POST);
        $this->render('Annoncesod/add_annonce', compact('form', 'error','lastid','suite','listeType','listeCategorie'));
    }
}

