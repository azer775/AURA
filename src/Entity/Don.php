<?php

namespace App\Entity;

use App\Repository\DonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;
use DateTimeInterface;
use DateTimeImmutable;

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
    #[ORM\Column(type: 'float')]
    #[Assert\NotBlank(message: 'Please provide a montant.')]
    private ?float $montant = null;

    #[Assert\NotBlank]
    #[ORM\Column(type: 'datetime')]
    private ?DateTimeInterface $date_Don = null;

    #[Assert\NotBlank]
    #[Assert\Length(min: 16, max: 16)]
    #[ORM\Column(nullable: false)]
    #[Assert\NotBlank(message: 'Please provide a carteCredit.')]
    private ?string $carteCredit = null;

    #[Assert\NotBlank]
    #[ORM\Column(nullable: true)]
    #[Assert\NotBlank(message: 'Please provide a message.')]
    private ?string $message = null;

    #[Assert\Valid]
    #[ORM\ManyToOne(inversedBy: 'dons')]
    private ?Membre $membre = null;

    #[Assert\Valid]
    #[ORM\ManyToOne(inversedBy: 'dons')]
    private ?Association $association = null;

    public function __construct()
    {
        $this->date_Don = new DateTimeImmutable();
    }

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

    public function getDateDon(): ?DateTimeInterface
    {
        return $this->date_Don;
    }

    public function setDateDon(DateTimeInterface $date_Don): self
    {
        $this->date_Don = $date_Don;

        return $this;
    }

    public function getMembre(): ?Membre
    {
        return $this->membre;
    }

    public function setMembre(?Membre $membre): self
    {
        $this->membre = $membre;

        return $this;
    }

    public function getAssociation(): ?Association
    {
        return $this->association;
    }

    public function setAssociation(?Association $association): self
    {
        $this->association = $association;

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