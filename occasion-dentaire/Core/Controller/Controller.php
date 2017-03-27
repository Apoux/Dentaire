<?php

namespace Core\Controller;

class Controller{

    protected $path;
    protected $template;

    /**
     * Controller constructor.
     */
    public function __construct(){
        $this->path = 'App/Views/';
    }


    protected function render($view, $datas = []){
        ob_start();
        extract($datas);
        require($this->path . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->path . 'Templates/' . $this->template . '.php');
    }

    protected function denied(){
        $this->template = 'default';
        $this->render('Error/404');
        die;
    }

}