<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CityRepository::class)
 * @ApiResource(
 *     subresourceOperations={
 *          "api_city_get_subresource"={
 *              "normalization_context"={"groups"={"city"}}
 *        }
 *     },
 *     collectionOperations={"GET","POST"},
 *     itemOperations={"GET","PUT","DELETE"},
 * )
 */
class City
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"city:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"city:read"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"city:read"})
     */
    private $map;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="cities")
     * @Groups({"city:read"})
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="city", orphanRemoval=true)
     */
    private $pictures;

    public function __construct()
    {
        $this->pictures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMap(): ?string
    {
        return $this->map;
    }

    public function setMap(string $map): self
    {
        $this->map = $map;

        return $this;
    }

    public function getCountry(): ?country
    {
        return $this->country;
    }

    public function setCountry(?country $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setCity($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->contains($picture)) {
            $this->pictures->removeElement($picture);
            // set the owning side to null (unless already changed)
            if ($picture->getCity() === $this) {
                $picture->setCity(null);
            }
        }

        return $this;
    }
}
