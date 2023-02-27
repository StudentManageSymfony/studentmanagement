<?php

namespace App\Entity;

use App\Repository\ClubsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use function PHPUnit\Framework\isNull;

#[ORM\Entity(repositoryClass: ClubsRepository::class)]
class Clubs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $clubId = null;

    #[ORM\Column(length: 40)]
    private ?string $clubName = null;

    #[Assert\GreaterThanOrEqual(
        value: 15,
    )]
    #[ORM\Column]
    private ?int $numberOfMembers = null;

    #[ORM\Column(length: 40)]
    private ?string $leaderName = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'clubId', targetEntity: Member::class, orphanRemoval: true)]
    private Collection $clubMember;

    #[ORM\OneToMany(mappedBy: 'club', targetEntity: Activities::class)]
    private Collection $activities_club;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    public function __construct()
    {
        $this->clubMember = new ArrayCollection();
        $this->activities_club = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClubId(): ?string
    {
        return $this->clubId;
    }

    public function setClubId(string $clubId): self
    {
        $this->clubId = $clubId;

        return $this;
    }

    public function getClubName(): ?string
    {
        return $this->clubName;
    }

    public function setClubName(string $clubName): self
    {
        $this->clubName = $clubName;

        return $this;
    }

    public function getNumberOfMembers(): ?int
    {
        return $this->numberOfMembers;
    }

    public function setNumberOfMembers(int $numberOfMembers): self
    {
        $this->numberOfMembers = $numberOfMembers;

        return $this;
    }

    public function getLeaderName(): ?string
    {
        return $this->leaderName;
    }

    public function setLeaderName(string $leaderName): self
    {
        $this->leaderName = $leaderName;

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

    /**
     * @return Collection<int, Member>
     */
    public function getClubMember(): Collection
    {
        return $this->clubMember;
    }

    public function addClubMember(Member $clubMember): self
    {
        if (!$this->clubMember->contains($clubMember)) {
            $this->clubMember->add($clubMember);
            $clubMember->setClubId($this);
        }

        return $this;
    }

    public function removeClubMember(Member $clubMember): self
    {
        if ($this->clubMember->removeElement($clubMember)) {
            // set the owning side to null (unless already changed)
            if ($clubMember->getClubId() === $this) {
                $clubMember->setClubId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Activities>
     */
    public function getActivitiesClub(): Collection
    {
        return $this->activities_club;
    }

    public function addActivitiesClub(Activities $activitiesClub): self
    {
        if (!$this->activities_club->contains($activitiesClub)) {
            $this->activities_club->add($activitiesClub);
            $activitiesClub->setClub($this);
        }

        return $this;
    }

    public function removeActivitiesClub(Activities $activitiesClub): self
    {
        if ($this->activities_club->removeElement($activitiesClub)) {
            // set the owning side to null (unless already changed)
            if ($activitiesClub->getClub() === $this) {
                $activitiesClub->setClub(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
