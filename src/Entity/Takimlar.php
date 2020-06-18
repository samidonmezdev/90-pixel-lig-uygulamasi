<?php

namespace App\Entity;

use App\Repository\TakimlarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TakimlarRepository::class)
 */
class Takimlar
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
    private $ad;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $atilangol;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $yenilengol;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $galibiyet;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maglubiyet;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $beraberlik;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $hafta;

    /**
     * @ORM\OneToMany(targetEntity=Maclar::class, mappedBy="takim1", orphanRemoval=true)
     */
    private $maclars;

    /**
     * @ORM\OneToMany(targetEntity=Maclar::class, mappedBy="takim2")
     */
    private $maclars2;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $puan;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $averaj;
    public function __construct()
    {
        $this->maclars = new ArrayCollection();
        $this->maclars2 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAd(): ?string
    {
        return $this->ad;
    }

    public function setAd(string $ad): self
    {
        $this->ad = $ad;

        return $this;
    }

    public function getAtilangol(): ?int
    {
        return $this->atilangol;
    }

    public function setAtilangol(?int $atilangol): self
    {
        $this->atilangol = $atilangol;

        return $this;
    }

    public function getYenilengol(): ?int
    {
        return $this->yenilengol;
    }

    public function setYenilengol(?int $yenilengol): self
    {
        $this->yenilengol = $yenilengol;

        return $this;
    }

    public function getGalibiyet(): ?int
    {
        return $this->galibiyet;
    }

    public function setGalibiyet(?int $galibiyet): self
    {
        $this->galibiyet = $galibiyet;

        return $this;
    }

    public function getMaglubiyet(): ?int
    {
        return $this->maglubiyet;
    }

    public function setMaglubiyet(?int $maglubiyet): self
    {
        $this->maglubiyet = $maglubiyet;

        return $this;
    }

    public function getBeraberlik(): ?int
    {
        return $this->beraberlik;
    }

    public function setBeraberlik(?int $beraberlik): self
    {
        $this->beraberlik = $beraberlik;

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

    /**
     * @return Collection|Maclar[]
     */
    public function getMaclars(): Collection
    {
        return $this->maclars;
    }

    public function addMaclar(Maclar $maclar): self
    {
        if (!$this->maclars->contains($maclar)) {
            $this->maclars[] = $maclar;
            $maclar->setTakim1($this);
        }

        return $this;
    }

    public function removeMaclar(Maclar $maclar): self
    {
        if ($this->maclars->contains($maclar)) {
            $this->maclars->removeElement($maclar);
            // set the owning side to null (unless already changed)
            if ($maclar->getTakim1() === $this) {
                $maclar->setTakim1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Maclar[]
     */
    public function getMaclars2(): Collection
    {
        return $this->maclars2;
    }

    public function addMaclars2(Maclar $maclars2): self
    {
        if (!$this->maclars2->contains($maclars2)) {
            $this->maclars2[] = $maclars2;
            $maclars2->setTakim2($this);
        }

        return $this;
    }

    public function removeMaclars2(Maclar $maclars2): self
    {
        if ($this->maclars2->contains($maclars2)) {
            $this->maclars2->removeElement($maclars2);
            // set the owning side to null (unless already changed)
            if ($maclars2->getTakim2() === $this) {
                $maclars2->setTakim2(null);
            }
        }

        return $this;
    }

    public function getPuan(): ?int
    {
        return $this->puan;
    }

    public function setPuan(int $puan): self
    {
        $this->puan = $puan;

        return $this;
    }

    public function getAveraj(): ?int
    {
        return $this->averaj;
    }

    public function setAveraj(int $averaj): self
    {
        $this->averaj = $averaj;

        return $this;
    }
}
