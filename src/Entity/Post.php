<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="post")
 */
class Post
{
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(type="string", length=100, nullable=false)
     */
    private $titulo;

    /**
     * @Column(type="text", nullable=false)
     */
    private $conteudo;

    /**
     * @ManyToOne(targetEntity="App\Entity\Categoria", inversedBy="post")
     */
    private $categoria;

    public function __construct()
    {
        $this->categoria = new ArrayCollection();
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Post
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     * @return Post
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConteudo()
    {
        return $this->conteudo;
    }

    /**
     * @param mixed $conteudo
     * @return Post
     */
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;
        return $this;
    }

}