<?php

namespace Core\controller;

use stdClass;

abstract class Action
{

    protected $view;

    public function __construct()
    {
        $this->view = new stdClass;
    }

    protected function render($view, $layout)
    {
        $this->view->page = $view;

        //a função file_exists verifica se um arquivo existe dentro do 
        //diretório informado. Caso exista a função retorna TRUE
        //Caso não exista a função retorna FALSE.

        if (file_exists("../app/views/layout/" . $layout . ".phtml")) {
            require_once("../app/views/layout/" . $layout . ".phtml");
        } else {
            //require_once("../app/views/layout/template_admin.phtml");
            $this->content();
        }

      


    }

    public function content()
    {
        $classeAtual = get_class($this);
        $classeAtual = str_replace('App\\controllers\\', '', $classeAtual);

        $classeAtual = strtolower(str_replace('Controller', '', $classeAtual));

        require_once('../app/views/' . $classeAtual . '/' . $this->view->page . '.phtml');
    }
}
