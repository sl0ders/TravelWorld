<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PictureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PictureRepository")
 * @ApiResource(
 *     subresourceOperations={
 *          "api_pictures_get_subresource"={
 *              "normalization_context"={"groups"={"pictures:read"}}
 *        }
 *     },
 *     collectionOperations={"GET","POST"},
 *     itemOperations={"GET","PUT","DELETE"},
 * )
 */
class Picture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"pictures:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="pictures")
     * @Groups({"pictures:read"})
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"pictures:read"})
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"pictures:read"})
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"pictures:read"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"pictures:read"})
     */
    private $taken_at;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"pictures:read"})
     */
    private $url;

    /**
     * @ORM\ManyToOne(targetEntity=City::class, inversedBy="pictures")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"pictures:read"})
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="picture")
     * @Groups({"pictures:read"})
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity=Smiley::class, mappedBy="picture")
     * @Groups({"pictures:read"})
     */
    private $smileys;


    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->smileys = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getTakenAt(): ?\DateTimeInterface
    {
        return $this->taken_at;
    }

    public function setTakenAt(?\DateTimeInterface $taken_at): self
    {
        $this->taken_at = $taken_at;

        return $this;
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

    public function getCity(): ?city
    {
        return $this->city;
    }

    public function setCity(?city $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setPicture($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getPicture() === $this) {
                $comment->setPicture(null);
            }
        }

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
            $smiley->setPicture($this);
        }

        return $this;
    }

    public function removeSmiley(Smiley $smiley): self
    {
        if ($this->smileys->contains($smiley)) {
            $this->smileys->removeElement($smiley);
            // set the owning side to null (unless already changed)
            if ($smiley->getPicture() === $this) {
                $smiley->setPicture(null);
            }
        }

        return $this;
    }
}
