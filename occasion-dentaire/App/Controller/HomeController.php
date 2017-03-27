<?php

namespace App\Controller;

use Core\Controller\Controller;
use App\Entity\User;
use Core\HTML\TemplateForm;
use App\Model\UserRepository;

class HomeController extends Controller
{
    public function index() {
        $this->template = 'default';
        $this->render('Home/index');
    }
    public function cgu() {
        $this->template = 'default2';
        $this->render('Home/cgu');
    }

}