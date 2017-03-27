<?php

namespace App\Controller;


use App\Model\UserRepository;
use Core\Controller\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $userrepo = new UserRepository();
        if(!$userrepo->isloggedAdmin()){
            $this->denied();
        }
    }

    public function index() {
        $this->template = 'default';
        $this->render('Admin/index');
    }
}