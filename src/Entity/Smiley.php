<?php

namespace App\Entity;

use App\Repository\SmileyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SmileyRepository::class)
 */
class Smiley
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Icons::class, inversedBy="smileys")
     */
    private $icon;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="smileys")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Picture::class, inversedBy="smileys")
     */
    private $picture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIcon(): ?icons
    {
        return $this->icon;
    }

    public function setIcon(?icons $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPicture(): ?picture
    {
        return $this->picture;
    }

    public function setPicture(?picture $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}
