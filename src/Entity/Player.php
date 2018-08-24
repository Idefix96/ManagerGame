<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 */
class Player {
	/**
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $lastname;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $name;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $altName;

	/**
	 * @ORM\ManyToOne(targetEntity="Club", inversedBy="players")
	 * @ORM\JoinColumn(name="currentClub", referencedColumnName="id", nullable=true)
	 */
	private $currentClub;

	/**
	 * @ORM\ManyToMany(targetEntity="App\Entity\PlayerPosition")
	 */
	private $position;

	public function __construct() {
		$this->position = new ArrayCollection();
	}

	public function getId() {
		return $this->id;
	}

	public function getLastname():  ? string {
		return $this->lastname;
	}

	public function setLastname(string $lastname) : self{
		$this->lastname = $lastname;

		return $this;
	}

	public function getName():  ? string {
		return $this->name;
	}

	public function setName(string $name) : self{
		$this->name = $name;

		return $this;
	}

	public function getAltName():  ? string {
		return $this->altName;
	}

	public function setAltName( ? string $altName) : self{
		$this->altName = $altName;

		return $this;
	}

	public function getCurrentClub() :  ? Club {
		return $this->currentClub;
	}

	public function setCurrentClub( ? Club $currentClub) : self{
		$this->currentClub = $currentClub;

		return $this;
	}

	/**
	 * @return Collection|PlayerPosition[]
	 */
	public function getPosition() : Collection {
		return $this->position;
	}

	public function addPosition(PlayerPosition $position): self {
		if (!$this->position->contains($position)) {
			$this->position[] = $position;
		}

		return $this;
	}

	public function removePosition(PlayerPosition $position): self {
		if ($this->position->contains($position)) {
			$this->position->removeElement($position);
		}

		return $this;
	}

}
