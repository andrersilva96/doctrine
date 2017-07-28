<?php

namespace Init;

abstract class Bootstrap
{
    private $routes;
    
    // Inicia a aplicacao
    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }
    
    protected function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }
    
    // Rotas criadas
    abstract protected function initRoutes();
    
    protected function run($url)
    {
        // Verifica se existe rota
		/*
		Isto é um recurso de "escopo" adicionado ao PHP.
		Imagine que você queria usar a variável $url dentro de uma função.
		Utilize o use e será criado um espelho da variável, permitindo o acesso.
		Podemos usar no contexto qualquer tipo de variável e
		múltiplas ao mesmo tempo, separadas por vírgula, entendeu?
		*/
        array_walk($this->routes, function($route) use($url){
            if($url[1] == $route['route']){
                $class = "App\\Controller\\".ucfirst($route['controller']);
                // Passando o endereco da classe
                $controller = new $class;
                $action = $route['action'];
                $controller->$action();
            }
        });
    }
    
    protected function getUrl()
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $route = explode ( '/' , $url);
        // obtendo as rotas
        return $route;
    }
}