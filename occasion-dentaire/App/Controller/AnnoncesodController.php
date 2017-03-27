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
use Core\Controller\Controller;


class AnnoncesodController extends Controller
{
    public function index() {
        $this->template = 'default';
        $start = 1;
        $par_page=1;
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
            $annonce = $annoncesodrepo->getAnnonceod($_GET['id']);
            if ($annonce) {
                $this->render('Annoncesod/view_annonce', compact('annonce'));
            } else {
                $this->render('Error/nothing');
            }
        }   else {
            $this->render('Error/404');
        }
    }

}