<?php

namespace App\controllers;

use Core\controller\Action;

class ProdutoController extends Action
{
    
    public function index()
    {
        $this->view->dados = array("Mouse", "Caneta", "Teclado");
        $this->render("index");
    }

    
}



// IndexController


