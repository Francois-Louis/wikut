<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{

    use TimestampableEntity;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("api_feed")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("api_feed")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Gedmo\Slug(fields={"name", "id"})
     * @Groups("api_feed")
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     * @Groups("api_feed")
     */
    private $description;

    /**
     * @ORM\Column(type="smallint", options={"default": 0}, nullable=true)
     * @Groups("api_feed")
     */
    private $score;

    /**
     * @ORM\Column(type="integer", options={"default": 0}, nullable=true)
     * @Groups("api_feed")
     */
    private $views;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("api_feed")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Vote::class, mappedBy="project")
     * @Groups("api_feed")
     */
    private $votes;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="project")
     * @Groups("api_feed")
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("api_feed")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="project")
     * @Groups("api_feed")
     */
    private $pictures;

    /**
     * @ORM\ManyToOne(targetEntity=Blade::class, inversedBy="Projects")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("api_feed")
     */
    private $blade;

    /**
     * @ORM\ManyToMany(targetEntity=Handle::class, mappedBy="projects")
     * @Groups("api_feed")
     */
    private $handles;

    /**
     * @ORM\ManyToMany(targetEntity=Style::class, mappedBy="projects")
     * @Groups("api_feed")
     */
    private $styles;

    /**
     * @ORM\OneToMany(targetEntity=Report::class, mappedBy="target_project")
     */
    private $denounced;

    public function __construct()
    {
        $this->votes = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->pictures = new ArrayCollection();
        $this->handles = new ArrayCollection();
        $this->styles = new ArrayCollection();
        $this->denounced = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(int $views): self
    {
        $this->views = $views;

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

    /**
     * @return Collection<int, Vote>
     */
    public function getVotes(): Collection
    {
        return $this->votes;
    }

    public function addVote(Vote $vote): self
    {
        if (!$this->votes->contains($vote)) {
            $this->votes[] = $vote;
            $vote->setProject($this);
        }

        return $this;
    }

    public function removeVote(Vote $vote): self
    {
        if ($this->votes->removeElement($vote)) {
            // set the owning side to null (unless already changed)
            if ($vote->getProject() === $this) {
                $vote->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setProject($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getProject() === $this) {
                $comment->setProject(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Picture>
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setProject($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getProject() === $this) {
                $picture->setProject(null);
            }
        }

        return $this;
    }

    public function getBlade(): ?Blade
    {
        return $this->blade;
    }

    public function setBlade(?Blade $blade): self
    {
        $this->blade = $blade;

        return $this;
    }

    /**
     * @return Collection<int, Handle>
     */
    public function getHandles(): Collection
    {
        return $this->handles;
    }

    public function addHandle(Handle $handle): self
    {
        if (!$this->handles->contains($handle)) {
            $this->handles[] = $handle;
            $handle->addProject($this);
        }

        return $this;
    }

    public function removeHandle(Handle $handle): self
    {
        if ($this->handles->removeElement($handle)) {
            $handle->removeProject($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Style>
     */
    public function getStyles(): Collection
    {
        return $this->styles;
    }

    public function addStyle(Style $style): self
    {
        if (!$this->styles->contains($style)) {
            $this->styles[] = $style;
            $style->addProject($this);
        }

        return $this;
    }

    public function removeStyle(Style $style): self
    {
        if ($this->styles->removeElement($style)) {
            $style->removeProject($this);
        }

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
            $denounced->setTargetProject($this);
        }

        return $this;
    }

    public function removeDenounced(Report $denounced): self
    {
        if ($this->denounced->removeElement($denounced)) {
            // set the owning side to null (unless already changed)
            if ($denounced->getTargetProject() === $this) {
                $denounced->setTargetProject(null);
            }
        }

        return $this;
    }
}
