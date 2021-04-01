<?php

namespace App\Entity;

use App\Repository\CandidatEvaluationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidatEvaluationRepository::class)
 */
class CandidatEvaluation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $notes;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hired;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getHired(): ?bool
    {
        return $this->hired;
    }

    public function setHired(bool $hired): self
    {
        $this->hired = $hired;

        return $this;
    }
}
