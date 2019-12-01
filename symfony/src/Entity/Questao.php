<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestaoRepository")
 */
class Questao
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Assunto", inversedBy="questaos")
     */
    private $assunto;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Banca")
     */
    private $banca;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Orgao")
     */
    private $orgao;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getAssunto(): ?Assunto
    {
        return $this->assunto;
    }

    public function setAssunto(?Assunto $assunto): self
    {
        $this->assunto = $assunto;

        return $this;
    }

    public function getBanca(): ?Banca
    {
        return $this->banca;
    }

    public function setBanca(?Banca $banca): self
    {
        $this->banca = $banca;

        return $this;
    }

    public function getOrgao(): ?Orgao
    {
        return $this->orgao;
    }

    public function setOrgao(?Orgao $orgao): self
    {
        $this->orgao = $orgao;

        return $this;
    }
}
