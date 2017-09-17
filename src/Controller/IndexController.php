<?php

namespace App\Controller;

use App\Entity\Categoria;
use App\Entity\Post;
use Init\Controller\Action;

class IndexController extends Action
{
    public function index()
    {
        $entityManager = getEntityManager();
        $repPost = $entityManager->getRepository(Post::class);
        $repCategoria = $entityManager->getRepository(Categoria::class);

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            // Monta uma query, passo um alias paa meu post
            $query = $repPost->createQueryBuilder('p');
            $query->join('p.categoria', 'c')
                ->where($query->expr()->eq('c.id', $_GET['search']));
            //echo $query->getQuery()->getSql(); // printa o sql
            // Retorna o resultado da query que foi consultada
            //getArrayResult retorna como array
            $posts = $query->getQuery()->getResult();
        } else {
            $posts = $repPost->findAll();
        }

        $this->view->post = $posts;
        $this->view->categoria = $repCategoria->findAll();
        $this->render(__FUNCTION__);
    }
}