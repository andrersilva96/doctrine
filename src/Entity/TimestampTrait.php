<?php

namespace App\Entity;

trait TimestampTrait
{
    /**
     * @Column(type="datetime")
     */
    private $dataCriada;

    /**
     * @Column(type="datetime")
     */
    private $dataAtualizada;

    /**
     * @return mixed
     */
    public function getDataAtualizada()
    {
        return $this->dataAtualizada;
    }

    /**
     * @param mixed $dataAtualizada
     * @PrePersist
     * @PreUpdate
     */
    public function setDataAtualizada()
    {
        $this->dataAtualizada = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getDataCriada()
    {
        return $this->dataCriada;
    }

    /**
     * pre persist -> antes de inserir a entidade no banco
     * @param mixed $dataCriada
     * @PrePersist
     */
    public function setDataCriada()
    {
        $this->dataCriada = new \DateTime();
    }

    /**
     * @ PrePersist
     * public function calculateTotal(){
     *      $somar = 0;
     *      foreach($this->produtos as $produto){
     *          $somar += $produto->getPreco()
     *
     *      }
     *      $this->total = $soma
     * }
     */
}