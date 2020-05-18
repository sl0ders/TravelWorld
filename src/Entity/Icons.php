<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\IconsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=IconsRepository::class)
 * @ApiResource(
 *     subresourceOperations={
 *          "api_icons_get_subresource"={
 *              "normalization_context"={"groups"={"icons:read"}}
 *        }
 *     },
 *     collectionOperations={"GET","POST"},
 *     itemOperations={"GET","PUT","DELETE"},
 * )
 */
class Icons
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"icons:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"icons:read"})
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"icons:read"})
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Smiley::class, mappedBy="icon")
     * @Groups({"icons:read"})
     */
    private $smileys;

    public function __construct()
    {
        $this->smileys = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Smiley[]
     */
    public function getSmileys(): Collection
    {
        return $this->smileys;
    }

    public function addSmiley(Smiley $smiley): self
    {
        if (!$this->smileys->contains($smiley)) {
            $this->smileys[] = $smiley;
            $smiley->setIcon($this);
        }

        return $this;
    }

    public function removeSmiley(Smiley $smiley): self
    {
        if ($this->smileys->contains($smiley)) {
            $this->smileys->removeElement($smiley);
            // set the owning side to null (unless already changed)
            if ($smiley->getIcon() === $this) {
                $smiley->setIcon(null);
            }
        }

        return $this;
    }
}
