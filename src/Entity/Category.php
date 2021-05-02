<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;
    
	 /**
     * @ORM\OneToMany(targetEntity="App\Entity\Entity", mappedBy="category")
     */
    private $entities;

    public function __construct()
    {
        $this->entities = new ArrayCollection();
    }

    /**
     * @return Collection|Entity[]
     */
    public function getEntities(): Collection
    {
        return $this->entities;
    }

    // addEntity() and removeEntity() were also added
	
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
}