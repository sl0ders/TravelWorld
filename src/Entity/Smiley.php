<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SmileyRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SmileyRepository::class)
 * @ApiResource(
 *     subresourceOperations={
 *          "api_smileys_get_subresource"={
 *              "normalization_context"={"groups"={"smileys:read"}}
 *        }
 *     },
 *     collectionOperations={"GET","POST"},
 *     itemOperations={"GET","PUT","DELETE"},
 * )
 */
class Smiley
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"smileys:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Icons::class, inversedBy="smileys")
     * @Groups({"smileys:read"})
     */
    private $icon;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="smileys")
     * @Groups({"smileys:read"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Picture::class, inversedBy="smileys")
     * @Groups({"smileys:read"})
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
