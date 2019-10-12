<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nickname;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\News", inversedBy="usersLiked")
     */
    private $likedNews;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\News", mappedBy="author")
     */
    private $createdNews;

    public function __construct()
    {
        $this->likedNews = new ArrayCollection();
        $this->createdNews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * @return Collection|News[]
     */
    public function getLikedNews(): Collection
    {
        return $this->likedNews;
    }

    public function addLikedNews(News $likedNews): self
    {
        if (!$this->likedNews->contains($likedNews)) {
            $this->likedNews[] = $likedNews;
        }

        return $this;
    }

    public function removeLikedNews(News $likedNews): self
    {
        if ($this->likedNews->contains($likedNews)) {
            $this->likedNews->removeElement($likedNews);
        }

        return $this;
    }

    /**
     * @return Collection|News[]
     */
    public function getCreatedNews(): Collection
    {
        return $this->createdNews;
    }

    public function addCreatedNews(News $createdNews): self
    {
        if (!$this->createdNews->contains($createdNews)) {
            $this->createdNews[] = $createdNews;
            $createdNews->setAuthor($this);
        }

        return $this;
    }

    public function removeCreatedNews(News $createdNews): self
    {
        if ($this->createdNews->contains($createdNews)) {
            $this->createdNews->removeElement($createdNews);
            // set the owning side to null (unless already changed)
            if ($createdNews->getAuthor() === $this) {
                $createdNews->setAuthor(null);
            }
        }

        return $this;
    }
}
