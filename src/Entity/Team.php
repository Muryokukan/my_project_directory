<?php
namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\OneToOne(mappedBy: 'team', cascade: ['persist', 'remove'])]
    private ?Score $score = null;

    // Ajoutez un constructeur par défaut
    public function __construct()
    {
        // Initialisez vos propriétés par défaut si nécessaire
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string  // Modifiez le retour à ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getScore(): ?Score
    {
        return $this->score;
    }

    public function setScore(?Score $score): static
    {
        // unset the owning side of the relation if necessary
        if ($score === null && $this->score !== null) {
            $this->score->setTeam(null);
        }

        // set the owning side of the relation if necessary
        if ($score !== null && $score->getTeam() !== $this) {
            $score->setTeam($this);
        }

        $this->score = $score;

        return $this;
    }
}