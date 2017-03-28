<?php


namespace App\Controller;


use Core\Controller\Controller;
use App\Model\AnnonceRepository;

class AnnoncesController extends Controller
{
    public function Tindex() {
        $this->template = 'default';
        $annoncesrepo = new AnnonceRepository();
        $annonces =  $annoncesrepo->getAllAnnonces();
        $this->render('Annonces/index', compact('annonces'));
    }

    public function view_annonce() {
        $this->template = 'default';
        $annoncerepo = new AnnonceRepository();
        if(isset($_GET['id'])) {
            $annonce = $annoncerepo->getAnnonce($_GET['id']);
            if ($annonce) {
                $this->render('Annonces/view_annonce', compact('annonce'));
            } else {
                $this->render('Error/404');
            }
        }   else {
            $this->render('Error/404');
        }
    }
}