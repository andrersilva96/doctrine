<?php

namespace App\Controller;

use App\Entity\Categoria;
use Init\Controller\Action;

class CategoriaController extends Action
{

    public function listarCategoria()
    {
        $entityManager = getEntityManager();
        $repositorio = $entityManager->getRepository(Categoria::class);
        
        $this->view->categoria = $repositorio->findAll();
        $this->render(__FUNCTION__);
    }

    public function criarCategoria()
    {
        // se a requisicao for post
        if($_POST){
            $categoria = new Categoria();

            // Seta o valor que tem que inserir
            $categoria->setNome($_POST['nome']);

            $entityManager = getEntityManager();
            // Persiste apenas diz ao Doctrine qual entidade do banco nos vamos modular
            $entityManager->persist($categoria);
            // Eh o que faz o CRUD
            $entityManager->flush();
            header('Location:/listar-categoria');
        }

        $this->render(__FUNCTION__);
    }

    public function editarCategoria()
    {
        $entityManager = getEntityManager();
        $repositorio = $entityManager->getRepository(Categoria::class);
        // Ja esta com o persiste, ou seja, eu nao preciso instanciar minha Classe porque ao usar o find o Doctrine
        // esta recuperando minha Classe
        $categoria = $repositorio->find($_GET['id']);

        if($_POST){
            $categoria->setNome($_POST['nome']);

            $entityManager->persist($categoria);
            $entityManager->flush();
            header('Location:/listar-categoria');
        }

        $this->view->produto = $categoria;
        $this->render(__FUNCTION__);
    }

    public function removerCategoria()
    {
        $entityManager = getEntityManager();
        $repositorio = $entityManager->getRepository(Categoria::class);
        $categoria = $repositorio->find($_GET['id']);
        // Remove eh o que deleta do banco
        $entityManager->remove($categoria);
        $entityManager->flush();

        header('Location:/listar-categoria');
    }
}