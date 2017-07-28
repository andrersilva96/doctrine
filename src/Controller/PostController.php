<?php

namespace App\Controller;

use App\Entity\Categoria;
use App\Entity\Post;
use Init\Controller\Action;

class PostController extends Action
{
    public function listarPost()
    {
        $entityManager = getEntityManager();
        $repositorio = $entityManager->getRepository(Post::class);

        $this->view->post = $repositorio->findAll();
        $this->render(__FUNCTION__);
    }

    public function criarPost()
    {
        $entityManager = getEntityManager();
        $categoria = $entityManager->getRepository(Categoria::class);

        if($_POST){
            $post = new Post();
            $post->setTitulo($_POST['titulo']);
            $post->setConteudo($_POST['conteudo']);

            // Ao inves de eu passar meu id na categoria, eu tenho que passar meu objeto da categoria que eu quero relacionar
            $categoria = $entityManager->getReference('App\Entity\Categoria', $_POST['categoria']);
            $post->setCategoria($categoria);
            $entityManager->persist($post);
            $entityManager->flush();

            header('Location:/listar-post');
        }

        $this->view->categoria = $categoria->findAll();
        $this->render(__FUNCTION__);
    }

    public function editarPost()
    {
        $entityManager = getEntityManager();
        $repCategoria = $entityManager->getRepository(Categoria::class);
        $repPost = $entityManager->getRepository(Post::class);
        $post = $repPost->find($_GET['id']);

        if($_POST){
            $post->setTitulo($_POST['titulo']);
            $post->setConteudo($_POST['conteudo']);
            $post->setCategoria($entityManager->getReference(Categoria::class, $_POST['categoria']));

            $entityManager->persist($post);
            $entityManager->flush();
            header('Location:/listar-post');
        }

        $this->view->post = $post;
        $this->view->categoria = $repCategoria->findAll();
        $this->render(__FUNCTION__);
    }

    public function removerPost()
    {
        $entityManager = getEntityManager();
        $repositorio = $entityManager->getRepository(Post::class);
        $post = $repositorio->find($_GET['id']);
        // Remove eh o que deleta do banco
        $entityManager->remove($post);
        $entityManager->flush();

        header('Location:/listar-post');
    }
}