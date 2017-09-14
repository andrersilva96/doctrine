<?php

namespace App\Entity;

/**
 * @Entity
 * @HasLifecycleCallbacks
 * @Table(name="categoria")
 */
class Categoria
{
    use TimestampTrait;

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(type="string", length=100, nullable=false)
     */
    private $nome;

    /**
     * @OneToMany(targetEntity="App\Entity\Post", mappedBy="categoria")
     */
    private $posts;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Categoria
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     * @return Categoria
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

}