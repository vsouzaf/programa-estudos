<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AssuntoRepository")
 */
class Assunto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Assunto", cascade={"persist", "remove"})
     */
    private $assuntoPai;

    public function __construct()
    {
        $this->questaos = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getAssuntoPai()
    {
        return $this->assuntoPai;
    }

    public function setAssuntoPai($assuntoPai)
    {
        $this->assuntoPai = $assuntoPai;

        return $this;
    }
}
