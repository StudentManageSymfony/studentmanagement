<?php

namespace App\Entity;

use App\Repository\MemberRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MemberRepository::class)]
class Member
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'accountMember', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Account $accountId = null;

    #[ORM\ManyToOne(inversedBy: 'clubMember')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Clubs $clubId = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $memberRole = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccountId(): ?Account
    {
        return $this->accountId;
    }

    public function setAccountId(Account $accountId): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    public function getClubId(): ?Clubs
    {
        return $this->clubId;
    }

    public function setClubId(?Clubs $clubId): self
    {
        $this->clubId = $clubId;

        return $this;
    }

    public function getMemberRole(): ?int
    {
        return $this->memberRole;
    }

    public function setMemberRole(int $memberRole): self
    {
        $this->memberRole = $memberRole;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image=null): self
    {
        $this->image = $image;

        return $this;
    }
}
