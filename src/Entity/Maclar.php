<?php

namespace App\Entity;

use App\Repository\MaclarRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaclarRepository::class)
 */
class Maclar
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Takimlar::class, inversedBy="maclars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $takim1;

    /**
     * @ORM\ManyToOne(targetEntity=Takimlar::class, inversedBy="maclars2")
     */
    private $takim2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $t1gol;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $t2gol;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $hafta;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTakim1(): ?takimlar
    {
        return $this->takim1;
    }

    public function setTakim1(?takimlar $takim1): self
    {
        $this->takim1 = $takim1;

        return $this;
    }

    public function getTakim2(): ?Takimlar
    {
        return $this->takim2;
    }

    public function setTakim2(?Takimlar $takim2): self
    {
        $this->takim2 = $takim2;

        return $this;
    }

    public function getT1gol(): ?int
    {
        return $this->t1gol;
    }

    public function setT1gol(?int $t1gol): self
    {
        $this->t1gol = $t1gol;

        return $this;
    }

    public function getT2gol(): ?int
    {
        return $this->t2gol;
    }

    public function setT2gol(?int $t2gol): self
    {
        $this->t2gol = $t2gol;

        return $this;
    }

    public function getHafta(): ?int
    {
        return $this->hafta;
    }

    public function setHafta(?int $hafta): self
    {
        $this->hafta = $hafta;

        return $this;
    }

}
