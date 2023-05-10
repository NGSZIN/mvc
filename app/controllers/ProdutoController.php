<?php

namespace App\controllers;

use Core\controller\Action;
use App\database\Connection;
use App\models\ProdutoModel;

class ProdutoController extends Action
{
    
    public function index()
    {        
        $conn = Connection::getDb();

        $produto = new ProdutoModel($conn);

        $produtos = $produto->getProdutos();

        $this->view->dados = $produtos;

        $this->render("index", "layout");
    }

    public function create() {
        $this->view->dados = "";
        $this->render("produto", "layout");
    }
}



// IndexController


