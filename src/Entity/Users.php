<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $report;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tips", mappedBy="author")
     */
    private $tips;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Topics", mappedBy="author")
     */
    private $topics;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Articles", mappedBy="author")
     */
    private $articles;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ArticlesComments", mappedBy="author")
     */
    private $articlesComments;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TopicsComments", mappedBy="author")
     */
    private $topicsComments;

    public function __construct()
    {
        $this->tips = new ArrayCollection();
        $this->topics = new ArrayCollection();
        $this->articles = new ArrayCollection();
        $this->articlesComments = new ArrayCollection();
        $this->topicsComments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function getReport(): ?int
    {
        return $this->report;
    }

    public function setReport(?int $report): self
    {
        $this->report = $report;

        return $this;
    }

    /**
     * @return Collection|Tips[]
     */
    public function getTips(): Collection
    {
        return $this->tips;
    }

    public function addTip(Tips $tip): self
    {
        if (!$this->tips->contains($tip)) {
            $this->tips[] = $tip;
            $tip->setAuthor($this);
        }

        return $this;
    }

    public function removeTip(Tips $tip): self
    {
        if ($this->tips->contains($tip)) {
            $this->tips->removeElement($tip);
            // set the owning side to null (unless already changed)
            if ($tip->getAuthor() === $this) {
                $tip->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Topics[]
     */
    public function getTopics(): Collection
    {
        return $this->topics;
    }

    public function addTopic(Topics $topic): self
    {
        if (!$this->topics->contains($topic)) {
            $this->topics[] = $topic;
            $topic->setAuthor($this);
        }

        return $this;
    }

    public function removeTopic(Topics $topic): self
    {
        if ($this->topics->contains($topic)) {
            $this->topics->removeElement($topic);
            // set the owning side to null (unless already changed)
            if ($topic->getAuthor() === $this) {
                $topic->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Articles[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Articles $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setAuthor($this);
        }

        return $this;
    }

    public function removeArticle(Articles $article): self
    {
        if ($this->articles->contains($article)) {
            $this->articles->removeElement($article);
            // set the owning side to null (unless already changed)
            if ($article->getAuthor() === $this) {
                $article->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ArticlesComments[]
     */
    public function getArticlesComments(): Collection
    {
        return $this->articlesComments;
    }

    public function addArticlesComment(ArticlesComments $articlesComment): self
    {
        if (!$this->articlesComments->contains($articlesComment)) {
            $this->articlesComments[] = $articlesComment;
            $articlesComment->setAuthor($this);
        }

        return $this;
    }

    public function removeArticlesComment(ArticlesComments $articlesComment): self
    {
        if ($this->articlesComments->contains($articlesComment)) {
            $this->articlesComments->removeElement($articlesComment);
            // set the owning side to null (unless already changed)
            if ($articlesComment->getAuthor() === $this) {
                $articlesComment->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TopicsComments[]
     */
    public function getTopicsComments(): Collection
    {
        return $this->topicsComments;
    }

    public function addTopicsComment(TopicsComments $topicsComment): self
    {
        if (!$this->topicsComments->contains($topicsComment)) {
            $this->topicsComments[] = $topicsComment;
            $topicsComment->setAuthor($this);
        }

        return $this;
    }

    public function removeTopicsComment(TopicsComments $topicsComment): self
    {
        if ($this->topicsComments->contains($topicsComment)) {
            $this->topicsComments->removeElement($topicsComment);
            // set the owning side to null (unless already changed)
            if ($topicsComment->getAuthor() === $this) {
                $topicsComment->setAuthor(null);
            }
        }

        return $this;
    }
}