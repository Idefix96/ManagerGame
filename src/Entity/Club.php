<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClubRepository")
 */
class Club {
	/**
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $name;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $alternateName1;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $alternateName2;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $shortName1;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $shortName2;

	/**
	 * @ORM\OneToMany(targetEntity="Player", mappedBy="currentClub")
	 * @ORM\JoinColumn(name="player_id", referencedColumnName="id")
	 */
	private $players;

	public function __construct() {
		$this->players = new ArrayCollection();
	}

	public function getId() {
		return $this->id;
	}

	public function getName():  ? string {
		return $this->name;
	}

	public function setName(string $name) : self{
		$this->name = $name;

		return $this;
	}

	public function getAlternateName1():  ? string {
		return $this->alternateName1;
	}

	public function setAlternateName1( ? string $alternateName1) : self{
		$this->alternateName1 = $alternateName1;

		return $this;
	}

	public function getAlternateName2() :  ? string {
		return $this->alternateName2;
	}

	public function setAlternateName2( ? string $alternateName2) : self{
		$this->alternateName2 = $alternateName2;

		return $this;
	}

	public function getShortName1() :  ? string {
		return $this->shortName1;
	}

	public function setShortName1( ? string $shortName1) : self{
		$this->shortName1 = $shortName1;

		return $this;
	}

	public function getShortName2() :  ? string {
		return $this->shortName2;
	}

	public function setShortName2( ? string $shortName2) : self{
		$this->shortName2 = $shortName2;

		return $this;
	}

	/**
	 * @return Collection|Player[]
	 */
	public function getPlayers() : Collection {
		return $this->players;
	}

	public function addPlayers(Player $player): self {
		if (!$this->players->contains($player)) {
			$this->players[] = $player;
		}

		return $this;
	}

	public function removePosition(Player $player): self {
		if ($this->players->contains($player)) {
			$this->players->removeElement($player);
		}

		return $this;
	}
}
