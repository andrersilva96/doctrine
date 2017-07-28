<?php

namespace App\Model;

use Init\Bootstrap;

class Route extends Bootstrap
{
    // Rotas criadas
    protected function initRoutes()
    {
        $routes['home'] = ['route'=>'', 'controller' => 'IndexController',
            'action' => 'index'];

        $routes['listar-categoria'] = ['route'=>'listar-categoria', 'controller' => 'CategoriaController',
            'action' => 'listarCategoria'];

        $routes['criar-categoria'] = ['route'=>'criar-categoria', 'controller' => 'CategoriaController',
            'action' => 'criarCategoria'];

        $routes['editar-categoria'] = ['route'=>'editar-categoria', 'controller' => 'CategoriaController',
            'action' => 'editarCategoria'];

        $routes['remover-categoria'] = ['route'=>'remover-categoria', 'controller' => 'CategoriaController',
            'action' => 'removerCategoria'];

        $routes['listar-post'] = ['route'=>'listar-post', 'controller' => 'PostController',
            'action' => 'listarPost'];

        $routes['criar-post'] = ['route'=>'criar-post', 'controller' => 'PostController',
            'action' => 'criarPost'];

        $routes['editar-post'] = ['route'=>'editar-post', 'controller' => 'PostController',
            'action' => 'editarPost'];

        $routes['remover-post'] = ['route'=>'remover-post', 'controller' => 'PostController',
            'action' => 'removerPost'];

        $this->setRoutes($routes);
    }
}