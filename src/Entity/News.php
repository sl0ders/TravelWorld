<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NewsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=NewsRepository::class)
 * @ApiResource(
 *     subresourceOperations={
 *          "api_news_get_subresource"={
 *              "normalization_context"={"groups"={"news:read"}}
 *        }
 *     },
 *     collectionOperations={"GET","POST"},
 *     itemOperations={"GET","PUT","DELETE"},
 * )
 */
class News
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"news:read"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Picture::class ,cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"news:read"})
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"news:read"})
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Groups({"news:read"})
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"news:read"})
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="news")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"news:read"})
     */
    private $author;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicture(): ?picture
    {
        return $this->picture;
    }

    public function setPicture(picture $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getAuthor(): ?user
    {
        return $this->author;
    }

    public function setAuthor(?user $author): self
    {
        $this->author = $author;

        return $this;
    }
}
