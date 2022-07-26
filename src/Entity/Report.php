<?php

namespace App\Entity;

use App\Repository\ReportRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass=ReportRepository::class)
 */
class Report
{
    use TimestampableEntity;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $problem;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reports")
     */
    private $informer;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="denounced")
     */
    private $target_user;

    /**
     * @ORM\ManyToOne(targetEntity=Project::class, inversedBy="denounced")
     */
    private $target_project;

    /**
     * @ORM\ManyToOne(targetEntity=Comment::class, inversedBy="denounced")
     */
    private $target_comment;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProblem(): ?string
    {
        return $this->problem;
    }

    public function setProblem(?string $problem): self
    {
        $this->problem = $problem;

        return $this;
    }

    public function getInformer(): ?User
    {
        return $this->informer;
    }

    public function setInformer(?User $informer): self
    {
        $this->informer = $informer;

        return $this;
    }

    public function getTargetUser(): ?User
    {
        return $this->target_user;
    }

    public function setTargetUser(?User $target_user): self
    {
        $this->target_user = $target_user;

        return $this;
    }

    public function getTargetProject(): ?Project
    {
        return $this->target_project;
    }

    public function setTargetProject(?Project $target_project): self
    {
        $this->target_project = $target_project;

        return $this;
    }

    public function getTargetComment(): ?Comment
    {
        return $this->target_comment;
    }

    public function setTargetComment(?Comment $target_comment): self
    {
        $this->target_comment = $target_comment;

        return $this;
    }
}
