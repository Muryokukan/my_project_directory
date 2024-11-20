<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Player
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $lastName;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team", inversedBy="players")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Team $team = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $position;

    // Getters et setters
}
