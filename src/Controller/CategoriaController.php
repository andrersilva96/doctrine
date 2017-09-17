<?php

namespace App\Controller;

use App\Entity\Categoria;
use App\Entity\Repository\AbstractRepository;
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

            $categoriaRepository = getEntityManager()->getRepository(Categoria::class);
            $categoriaRepository->save($categoria);

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
        $abstractRepository = getEntityManager()->getRepository(Categoria::class);
        $abstractRepository->delete($_GET['id']);
        header('Location:/listar-categoria');
    }
}