<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{

    use TimestampableEntity;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Project::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $project;

    /**
     * @ORM\OneToMany(targetEntity=Report::class, mappedBy="target_comment")
     */
    private $denounced;

    /**
     * @ORM\ManyToOne(targetEntity=Comment::class, inversedBy="topic")
     */
    private $answer;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="answer")
     */
    private $topic;

    public function __construct()
    {
        $this->topic = new ArrayCollection();
        $this->answers = new ArrayCollection();
        $this->denounced = new ArrayCollection();
    }

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    /**
     * @return Collection<int, Report>
     */
    public function getDenounced(): Collection
    {
        return $this->denounced;
    }

    public function addDenounced(Report $denounced): self
    {
        if (!$this->denounced->contains($denounced)) {
            $this->denounced[] = $denounced;
            $denounced->setTargetComment($this);
        }

        return $this;
    }

    public function removeDenounced(Report $denounced): self
    {
        if ($this->denounced->removeElement($denounced)) {
            // set the owning side to null (unless already changed)
            if ($denounced->getTargetComment() === $this) {
                $denounced->setTargetComment(null);
            }
        }

        return $this;
    }

    public function getAnswer(): ?self
    {
        return $this->answer;
    }

    public function setAnswer(?self $answer): self
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getTopic(): Collection
    {
        return $this->topic;
    }

    public function addTopic(self $topic): self
    {
        if (!$this->topic->contains($topic)) {
            $this->topic[] = $topic;
            $topic->setAnswer($this);
        }

        return $this;
    }

    public function removeTopic(self $topic): self
    {
        if ($this->topic->removeElement($topic)) {
            // set the owning side to null (unless already changed)
            if ($topic->getAnswer() === $this) {
                $topic->setAnswer(null);
            }
        }

        return $this;
    }
}
