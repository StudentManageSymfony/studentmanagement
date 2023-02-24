<?php

namespace App\Entity;

use App\Repository\ActivitiesHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivitiesHistoryRepository::class)]
class ActivitiesHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'activitiesHistories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Activities $Activities = null;

    #[ORM\ManyToOne(inversedBy: 'activitiesHistories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Account $account = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivities(): ?Activities
    {
        return $this->Activities;
    }

    public function setActivities(?Activities $Activities): self
    {
        $this->Activities = $Activities;

        return $this;
    }

    public function getAccount(): ?Account
    {
        return $this->account;
    }

    public function setAccount(?Account $account): self
    {
        $this->account = $account;

        return $this;
    }
}
