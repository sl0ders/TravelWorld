<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
  *     subresourceOperations={
 *          "api_comments_get_subresource"={
 *              "normalization_context"={"groups"={"comments:read"}}
 *        }
 *     },
 *     collectionOperations={"GET","POST"},
 *     itemOperations={"GET","PUT","DELETE"},
 * )
 */
class Comment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"comments:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Groups({"comments:read"})
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comments")
     * @Groups({"comments:read"})
     */
    private $user;

    /**
     * @ORM\Column(type="smallint")
     * @Groups({"comments:read"})
     */
    private $enable;

    /**
     * @ORM\ManyToOne(targetEntity=Picture::class, inversedBy="comments")
     * @Groups({"comments:read"})
     */
    private $picture;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"comments:read"})
     */
    private $parentId;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"comments:read"})
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getEnable(): ?int
    {
        return $this->enable;
    }

    public function setEnable(int $enable): self
    {
        $this->enable = $enable;

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

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function setParentId(int $parentId): self
    {
        $this->parentId = $parentId;

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
}
