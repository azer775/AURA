<?php

namespace App\Entity;

use App\Repository\DonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DonRepository::class)]
class Don
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[Assert\NotBlank]
    #[Assert\Type('float')]
    #[Assert\Positive]
    #[ORM\Column]
    private ?float $montant = null;
    #[Assert\NotBlank]
    #[Assert\Date]
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_Don = null;
    #[Assert\NotBlank]
    #[Assert\Length(min: 16, max: 16)]
    #[ORM\Column(nullable: false)]
    private ?string $carteCredit = null;
    #[Assert\NotBlank]
    #[ORM\Column(nullable: true)]
    private ?string $message = null;
    #[Assert\Valid]
    #[ORM\ManyToOne(inversedBy: 'dons')]
    private ?Membre $Membre = null;
    #[Assert\Valid]
    #[ORM\ManyToOne(inversedBy: 'dons')]
    private ?Association $Association = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateDon(): ?\DateTimeInterface
    {
        return $this->date_Don;
    }

    public function setDateDon(\DateTimeInterface $date_Don): self
    {
        $this->date_Don = $date_Don;

        return $this;
    }

    public function getMembre(): ?Membre
    {
        return $this->Membre;
    }

    public function setMembre(?Membre $Membre): self
    {
        $this->Membre = $Membre;

        return $this;
    }

    public function getAssociation(): ?Association
    {
        return $this->Association;
    }

    public function setAssociation(?Association $Association): self
    {
        $this->Association = $Association;

        return $this;
    }
    public function getCarteCredit(): ?string
    {
        return $this->carteCredit;
    }

    public function setCarteCredit(?string $carteCredit): self
    {
        $this->carteCredit = $carteCredit;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }
}