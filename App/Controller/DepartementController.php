<?php

namespace App\Controller;


use App\Model\DepartementRepository;
use Core\Controller\Controller;

class DepartementController extends Controller
{
    public function listeCP(){
        $departementRepo = new DepartementRepository();
        $listeCP = $departementRepo->getAllDepartement();
        $this->render('User/listeCP', compact('listeCP'));


    }
}