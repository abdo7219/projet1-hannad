<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\EmployerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity(repositoryClass: EmployerRepository::class)]
class Employer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:3 , max:255, minMessage:"Pas assez de caractères, Il faut au moins  {{ limit }} caractères." )]
    #[Assert\NotBlank(message:"Ce champ ne doit pas être vide !")]
    private ?string $prenom = null;

    

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:3 , max:255, minMessage:"Pas assez de caractères, Il faut au moins  {{ limit }} caractères." )]
    #[Assert\NotBlank(message:"Ce champ ne doit pas être vide !")]

    private ?string $nom = null;


    #[ORM\Column(length: 255)]
    #[Assert\Regex(pattern:"/^[0-9]+$/i", htmlPattern: '^[0-9]+$')]
    #[Assert\NotBlank(message: "format non valide")]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    #[Assert\Email(message:" email non valide " )]
    #[Assert\NotBlank(message:"ce champs ne doit pas être vide." )]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:10 , max:255, minMessage:"Pas assez de caractères, Il faut au moins  {{ limit }} caractères." )]
    #[Assert\NotBlank(message:"Ce champ ne doit pas être vide !")]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:2 , max:255, minMessage:"Pas assez de caractères, Il faut au moins  {{ limit }} caractères." )]
    #[Assert\NotBlank(message:"Ce champ ne doit pas être vide !")]
    private ?string $poste = null;

    #[ORM\Column]
    #[Assert\Regex(pattern:"/^[0-9]+$/")]
    #[Assert\NotBlank(message: "format non valide")]
    private ?float $salaire = null;


    #[ORM\Column(type: Types::DATETIME_MUTABLE)]

    private ?\DateTimeInterface $datedenaissance = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getSalaire(): ?float
    {
        return $this->salaire;
    }

    public function setSalaire(float $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getDatedenaissance(): ?\DateTimeInterface
    {
        return $this->datedenaissance;
    }

    public function setDatedenaissance(\DateTimeInterface $datedenaissance): self
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }
}
