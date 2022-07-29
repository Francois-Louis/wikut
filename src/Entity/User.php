<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @Gedmo\Uploadable(path="./assets/img/avatar", filenameGenerator="SHA1", allowOverwrite=true, appendNumber=true)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{

    use TimestampableEntity;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("api_user")
     * @Groups("api_feed")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Groups("api_user")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Gedmo\UploadableFileName
     * @Groups("api_feed")
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255)
     * @Gedmo\Slug(fields={"pseudo", "company"})
     * @Groups("api_feed")
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\UploadableFilePath
     * @Groups("api_feed")
     */
    private $avatar;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $about;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $instagram;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\Column(type="smallint", options={"default":0}, nullable=true)
     */
    private $score;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("api_feed")
     */
    private $company;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="followers")
     * @ORM\JoinTable(
     *     name="follower_followed",
     *     joinColumns={
     *          @ORM\JoinColumn(name="follower_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *          @ORM\JoinColumn(name="followed_id", referencedColumnName="id")
     *     }
     * )
     */
    private $following;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="following")
     */
    private $followers;

    /**
     * @ORM\ManyToOne(targetEntity=Rank::class, inversedBy="users")
     */
    private $rank;

    /**
     * @ORM\ManyToOne(targetEntity=Status::class, inversedBy="users")
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity=Project::class, mappedBy="user")
     */
    private $projects;

    /**
     * @ORM\OneToMany(targetEntity=Vote::class, mappedBy="user")
     */
    private $votes;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="user")
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=City::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=true)
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="users")
     * @ORM\JoinColumn(name="country_code", referencedColumnName="code", nullable=false)
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity=Report::class, mappedBy="informer")
     */
    private $reports;

    /**
     * @ORM\OneToMany(targetEntity=Report::class, mappedBy="target_user")
     */
    private $denounced;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="blocked")
     * @ORM\JoinTable(
     *     name="blocker_blocked",
     *     joinColumns={
     *          @ORM\JoinColumn(name="blocker_id", referencedColumnName="id")},
     *     inverseJoinColumns={
     *          @ORM\JoinColumn(name="blocked_id", referencedColumnName="id")
     *  }
     * )
     */
    private $block;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="block")
     */
    private $blocked;

    /**
     * @ORM\Column(type="boolean")
     */
    private $banned;

    /**
     * @ORM\ManyToMany(targetEntity=Blade::class, inversedBy="users")
     */
    private $prefer_blade;

    /**
     * @ORM\ManyToMany(targetEntity=Handle::class, inversedBy="users")
     */
    private $prefer_handle;

    /**
     * @ORM\ManyToMany(targetEntity=Style::class, inversedBy="users")
     */
    private $prefer_style;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="users")
     */
    private $prefer_category;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    public function __construct()
    {
        $this->following = new ArrayCollection();
        $this->followers = new ArrayCollection();
        $this->projects = new ArrayCollection();
        $this->votes = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->reports = new ArrayCollection();
        $this->denounced = new ArrayCollection();
        $this->block = new ArrayCollection();
        $this->blocked = new ArrayCollection();
        $this->prefer_blade = new ArrayCollection();
        $this->prefer_handle = new ArrayCollection();
        $this->prefer_style = new ArrayCollection();
        $this->prefer_category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

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

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function getAvatarUrl(): ?string
    {
        if (!$this->avatar) {
            return null;
        }
        if (strpos($this->avatar, '/') !== false) {
            return $this->avatar;
        }
        return sprintf('/img/avatar/%s', $this->avatar);
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getAbout(): ?string
    {
        return $this->about;
    }

    public function setAbout(?string $about): self
    {
        $this->about = $about;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(?string $instagram): self
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

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

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getFollowing(): Collection
    {
        return $this->following;
    }

    public function addFollowing(self $following): self
    {
        if (!$this->following->contains($following)) {
            $this->following[] = $following;
        }

        return $this;
    }

    public function removeFollowing(self $following): self
    {
        $this->following->removeElement($following);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getFollowers(): Collection
    {
        return $this->followers;
    }

    public function addFollower(self $follower): self
    {
        if (!$this->followers->contains($follower)) {
            $this->followers[] = $follower;
            $follower->addFollowing($this);
        }

        return $this;
    }

    public function removeFollower(self $follower): self
    {
        if ($this->followers->removeElement($follower)) {
            $follower->removeFollowing($this);
        }

        return $this;
    }

    public function getRank(): ?Rank
    {
        return $this->rank;
    }

    public function setRank(?Rank $rank): self
    {
        $this->rank = $rank;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Project>
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setUser($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->removeElement($project)) {
            // set the owning side to null (unless already changed)
            if ($project->getUser() === $this) {
                $project->setUser(null);
            }
        }

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
            $vote->setUser($this);
        }

        return $this;
    }

    public function removeVote(Vote $vote): self
    {
        if ($this->votes->removeElement($vote)) {
            // set the owning side to null (unless already changed)
            if ($vote->getUser() === $this) {
                $vote->setUser(null);
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
            $comment->setUser($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getUser() === $this) {
                $comment->setUser(null);
            }
        }

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getIsVerified(): ?bool
    {
        return $this->isVerified;
    }

    /**
     * @return Collection<int, Report>
     */
    public function getReports(): Collection
    {
        return $this->reports;
    }

    public function addReport(Report $report): self
    {
        if (!$this->reports->contains($report)) {
            $this->reports[] = $report;
            $report->setInformer($this);
        }

        return $this;
    }

    public function removeReport(Report $report): self
    {
        if ($this->reports->removeElement($report)) {
            // set the owning side to null (unless already changed)
            if ($report->getInformer() === $this) {
                $report->setInformer(null);
            }
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
            $denounced->setTargetUser($this);
        }

        return $this;
    }

    public function removeDenounced(Report $denounced): self
    {
        if ($this->denounced->removeElement($denounced)) {
            // set the owning side to null (unless already changed)
            if ($denounced->getTargetUser() === $this) {
                $denounced->setTargetUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getBlock(): Collection
    {
        return $this->block;
    }

    public function addBlock(self $block): self
    {
        if (!$this->block->contains($block)) {
            $this->block[] = $block;
        }

        return $this;
    }

    public function removeBlock(self $block): self
    {
        $this->block->removeElement($block);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getBlocked(): Collection
    {
        return $this->blocked;
    }

    public function addBlocked(self $blocked): self
    {
        if (!$this->blocked->contains($blocked)) {
            $this->blocked[] = $blocked;
            $blocked->addBlock($this);
        }

        return $this;
    }

    public function removeBlocked(self $blocked): self
    {
        if ($this->blocked->removeElement($blocked)) {
            $blocked->removeBlock($this);
        }

        return $this;
    }

    public function isBanned(): ?bool
    {
        return $this->banned;
    }

    public function setBanned(bool $banned): self
    {
        $this->banned = $banned;

        return $this;
    }

    /**
     * @return Collection<int, Blade>
     */
    public function getPreferBlade(): Collection
    {
        return $this->prefer_blade;
    }

    public function addPreferBlade(Blade $preferBlade): self
    {
        if (!$this->prefer_blade->contains($preferBlade)) {
            $this->prefer_blade[] = $preferBlade;
        }

        return $this;
    }

    public function removePreferBlade(Blade $preferBlade): self
    {
        $this->prefer_blade->removeElement($preferBlade);

        return $this;
    }

    /**
     * @return Collection<int, Handle>
     */
    public function getPreferHandle(): Collection
    {
        return $this->prefer_handle;
    }

    public function addPreferHandle(Handle $preferHandle): self
    {
        if (!$this->prefer_handle->contains($preferHandle)) {
            $this->prefer_handle[] = $preferHandle;
        }

        return $this;
    }

    public function removePreferHandle(Handle $preferHandle): self
    {
        $this->prefer_handle->removeElement($preferHandle);

        return $this;
    }

    /**
     * @return Collection<int, Style>
     */
    public function getPreferStyle(): Collection
    {
        return $this->prefer_style;
    }

    public function addPreferStyle(Style $preferStyle): self
    {
        if (!$this->prefer_style->contains($preferStyle)) {
            $this->prefer_style[] = $preferStyle;
        }

        return $this;
    }

    public function removePreferStyle(Style $preferStyle): self
    {
        $this->prefer_style->removeElement($preferStyle);

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getPreferCategory(): Collection
    {
        return $this->prefer_category;
    }

    public function addPreferCategory(Category $preferCategory): self
    {
        if (!$this->prefer_category->contains($preferCategory)) {
            $this->prefer_category[] = $preferCategory;
        }

        return $this;
    }

    public function removePreferCategory(Category $preferCategory): self
    {
        $this->prefer_category->removeElement($preferCategory);

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }
}
