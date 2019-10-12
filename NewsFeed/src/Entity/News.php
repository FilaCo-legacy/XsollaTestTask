<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsRepository")
 */
class News
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAdded;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="likedNews")
     */
    private $usersLiked;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="createdNews")
     */
    private $author;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", inversedBy="news")
     */
    private $categories;

    public function __construct()
    {
        $this->usersLiked = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAdded(): ?\DateTimeInterface
    {
        return $this->dateAdded;
    }

    public function setDateAdded(\DateTimeInterface $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsersLiked(): Collection
    {
        return $this->usersLiked;
    }

    public function addUsersLiked(User $usersLiked): self
    {
        if (!$this->usersLiked->contains($usersLiked)) {
            $this->usersLiked[] = $usersLiked;
            $usersLiked->addLikedNews($this);
        }

        return $this;
    }

    public function removeUsersLiked(User $usersLiked): self
    {
        if ($this->usersLiked->contains($usersLiked)) {
            $this->usersLiked->removeElement($usersLiked);
            $usersLiked->removeLikedNews($this);
        }

        return $this;
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

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
        }

        return $this;
    }
}
