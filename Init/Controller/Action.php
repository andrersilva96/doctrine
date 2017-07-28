<?php

namespace Init\Controller;

abstract class Action
{
    protected $view;
    
    private $action;
        
    public function __construct() {
        $this->view = new \stdClass();
        
    }
    
    protected function render($action, $layout = true)
    {
        $this->action = $action;
        if ($layout == true) {
            include_once "../src/Views/layout.phtml";
        }else{
            $this->content();
        }
    }
    
    protected function content(){
        // Classe atualizada
        $current = get_class($this);
        $singleClassName = strtolower((str_replace("Controller","",str_replace("App\\Controller\\","",$current))));
        include_once "../src/Views/".$singleClassName."/".$this->action.".phtml";;
    }
}