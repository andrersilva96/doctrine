<?php

namespace App\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\UnitOfWork;

class AbstractRepository extends EntityRepository
{
    public function getReference($id, $class = null)
    {
        if(!$class){
            //obtem o nome do meu repositorio
            $class = $this->getClassName();
        }
        return $this->getEntityManager()->getReference($class, $id);
    }

    public function save($entity)
    {
        //se for uma entidade nova ele insere nova
        if($this->getEntityManager()->getUnitOfWork()->getEntityState($entity) == UnitOfWork::STATE_NEW){
            // Persiste apenas diz ao Doctrine qual entidade do banco nos vamos modular
            $this->getEntityManager()->persist($entity);
        }
        // Eh o que faz o CRUD
        $this->getEntityManager()->flush();
        return $entity;
    }

    public function delete($id)
    {
        $entity = $this->getReference($id);
        // Remove eh o que deleta do banco
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    //findOneByTitulo('teste', ['id' => 'desc']); Encontra um registro pelo titulo decrescente
    //findOneBy(['titulo' => 'teste', 'conteudo' => 'teste conteudo'], ['id' => 'desc'])
    //findByTitulo('teste', ['id' => 'desc']); Encontra todos os registro pelo titulo decrescente
    //findBy(['titulo' => 'teste', 'conteudo' => 'teste conteudo'])
}