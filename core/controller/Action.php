<?php

namespace Core\controller;
use stdClass;
abstract class Action {
    
    protected $view;

    public function __construct()
    {   
        $this->view = new stdClass;        
    }

    protected function render($view) {
        $classeAtual = get_class($this);
        $classeAtual = str_replace('App\\controllers\\', '', $classeAtual);

        $classeAtual = strtolower(str_replace('Controller', '', $classeAtual));

        require_once('../app/views/' . $classeAtual . '/' . $view . '.phtml');
    }

}
