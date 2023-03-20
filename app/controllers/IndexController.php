<?php

namespace App\controllers;

use Core\controller\Action;

class IndexController extends Action
{
    
    public function index()
    {
        $this->view->dados = array("Casa", "Apartamento", "Sobrado");
        $this->render("index");
    }

    public function sobre_nos()
    {
        $this->view->dados = array("Celular", "Tablet", "Ipad");
        $this->render("sobre_nos");
    }

    public function contato()
    {
        $this->view->dados = array("Arduino", "Node MCU", "Raspberry");
        $this->render("contato",);
    }

    
}



// IndexController


