<?php

namespace App\Entity;

use App\Repository\ActivitiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivitiesRepository::class)]
class Activities
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $Name = null;

    #[ORM\Column]
    private ?int $Score = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Image = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $StartDate = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $StartTime = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $EndTime = null;

    #[ORM\ManyToOne(inversedBy: 'activities_club')]
    private ?Clubs $club = null;

    #[ORM\OneToMany(mappedBy: 'Activities', targetEntity: ActivitiesHistory::class, orphanRemoval: true)]
    private Collection $activitiesHistories;

    public function __construct()
    {
        $this->activitiesHistories = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->Score;
    }

    public function setScore(int $Score): self
    {
        $this->Score = $Score;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(?string $Image=null): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->StartDate;
    }

    public function setStartDate(\DateTimeInterface $StartDate): self
    {
        $this->StartDate = $StartDate;

        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->StartTime;
    }

    public function setStartTime(\DateTimeInterface $StartTime): self
    {
        $this->StartTime = $StartTime;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->EndTime;
    }

    public function setEndTime(\DateTimeInterface $EndTime): self
    {
        $this->EndTime = $EndTime;

        return $this;
    }

    public function getClub(): ?Clubs
    {
        return $this->club;
    }

    public function setClub(?Clubs $club): self
    {
        $this->club = $club;

        return $this;
    }

    // public function __toString()
    // {
    //     return $this->Organizer;
    // }

    /**
     * @return Collection<int, ActivitiesHistory>
     */
    public function getActivitiesHistories(): Collection
    {
        return $this->activitiesHistories;
    }

    public function addActivitiesHistory(ActivitiesHistory $activitiesHistory): self
    {
        if (!$this->activitiesHistories->contains($activitiesHistory)) {
            $this->activitiesHistories->add($activitiesHistory);
            $activitiesHistory->setActivities($this);
        }

        return $this;
    }

    public function removeActivitiesHistory(ActivitiesHistory $activitiesHistory): self
    {
        if ($this->activitiesHistories->removeElement($activitiesHistory)) {
            // set the owning side to null (unless already changed)
            if ($activitiesHistory->getActivities() === $this) {
                $activitiesHistory->setActivities(null);
            }
        }

        return $this;
    }

}
