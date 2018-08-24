<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TextsRepository")
 */
class Texts
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
    private $textComponent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $translations;

    public function getId()
    {
        return $this->id;
    }

    public function getTextComponent(): ?string
    {
        return $this->textComponent;
    }

    public function setTextComponent(string $textComponent): self
    {
        $this->textComponent = $textComponent;

        return $this;
    }

    public function getTranslations(): ?string
    {
        return $this->translations;
    }

    public function setTranslations(string $translations): self
    {
        $this->translations = $translations;

        return $this;
    }
}
