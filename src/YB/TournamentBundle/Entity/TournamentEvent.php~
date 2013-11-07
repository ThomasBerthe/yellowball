<?php

namespace YB\TournamentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TournamentEvent
 *
 * @ORM\Table(name="tournament_event")
 * @ORM\Entity
 */
class TournamentEvent {
	// Type d'épreuve
	const TYPE_SM = 'TYPE_SM';
	const TYPE_SD = 'TYPE_SD';
	const TYPE_DM = 'TYPE_DM';
	const TYPE_DD = 'TYPE_DD';
	const TYPE_DX = 'TYPE_DX';

	// Catégorie
	const CAT_910 = 'CAT_910';
	const CAT_1112 = 'CAT_1112';
	const CAT_1314 = 'CAT_1314';
	const CAT_1516 = 'CAT_1516';
	const CAT_1718 = 'CAT_1718';
	const CAT_SENIOR = 'CAT_SENIOR';
	const CAT_SENIOR35 = 'CAT_SENIOR35';
	const CAT_SENIOR45 = 'CAT_SENIOR45';
	const CAT_SENIOR55 = 'CAT_SENIOR55';

	// Niveau
	const LVL_NC = 'LVL_NC';
	const LVL_40 = 'LVL_40';
	const LVL_305 = 'LVL_305';
	const LVL_304 = 'LVL_304';
	const LVL_303 = 'LVL_303';
	const LVL_302 = 'LVL_302';
	const LVL_301 = 'LVL_301';
	const LVL_30 = 'LVL_30';
	const LVL_155 = 'LVL_155';
	const LVL_154 = 'LVL_154';
	const LVL_153 = 'LVL_153';
	const LVL_152 = 'LVL_152';
	const LVL_151 = 'LVL_151';
	const LVL_15 = 'LVL_15';
	const LVL_56 = 'LVL_56';
	const LVL_46 = 'LVL_46';
	const LVL_36 = 'LVL_36';
	const LVL_26 = 'LVL_26';
	const LVL_16 = 'LVL_16';
	const LVL_0 = 'LVL_0';
	const LVL_N26 = 'LVL_N26';
	const LVL_N46 = 'LVL_N46';
	const LVL_N15 = 'LVL_N15';
	const LVL_N30 = 'LVL_N30';

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var YB\TournamentBundle\Entity\Tournament
	 *
	 * @ORM\ManyToOne(targetEntity="YB\TournamentBundle\Entity\Tournament", inversedBy="tournamentEvents", cascade={"all"})
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $tournament;

	/**
	 * @var enum
	 * 
	 * @ORM\Column(name="type", type="enumTournamentEventType")
	 */
	private $type;

	/**
	 * @var enum
	 * 
	 * @ORM\Column(name="category", type="enumTournamentEventCategory")
	 */
	private $category;

	/**
	 * @var enum
	 * 
	 * @ORM\Column(name="level_from", type="enumTournamentEventLevel")
	 */
	private $levelFrom;

	/**
	 * @var enum
	 * 
	 * @ORM\Column(name="level_to", type="enumTournamentEventLevel")
	 */
	private $levelTo;

	/**
	 * @var float
	 * 
	 * @ORM\Column(name="price", type="float")
	 */
	private $price;

	public function __toString() {
		return $this->getType() . $this->getCategory();
	}

	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set type
	 *
	 * @param enumTournamentEventType $type
	 * @return TournamentEvent
	 */
	public function setType($type) {
		$this->type = $type;

		return $this;
	}

	/**
	 * Get type
	 *
	 * @return enumTournamentEventType 
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Set category
	 *
	 * @param enumTournamentEventCategory $category
	 * @return TournamentEvent
	 */
	public function setCategory($category) {
		$this->category = $category;

		return $this;
	}

	/**
	 * Get category
	 *
	 * @return enumTournamentEventCategory 
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Set tournament
	 *
	 * @param \YB\TournamentBundle\Entity\Tournament $tournament
	 * @return TournamentEvent
	 */
	public function setTournament(\YB\TournamentBundle\Entity\Tournament $tournament) {
		$this->tournament = $tournament;

		return $this;
	}

	/**
	 * Get tournament
	 *
	 * @return \YB\TournamentBundle\Entity\Tournament 
	 */
	public function getTournament() {
		return $this->tournament;
	}

	/**
	 * Set price
	 *
	 * @param float $price
	 * @return TournamentEvent
	 */
	public function setPrice($price) {
		$this->price = $price;

		return $this;
	}

	/**
	 * Get price
	 *
	 * @return float 
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * Set levelFrom
	 *
	 * @param enumTournamentEventLevel $levelFrom
	 * @return TournamentEvent
	 */
	public function setLevelFrom($levelFrom) {
		$this->levelFrom = $levelFrom;

		return $this;
	}

	/**
	 * Get levelFrom
	 *
	 * @return enumTournamentEventLevel 
	 */
	public function getLevelFrom() {
		return $this->levelFrom;
	}

	/**
	 * Set levelTo
	 *
	 * @param enumTournamentEventLevel $levelTo
	 * @return TournamentEvent
	 */
	public function setLevelTo($levelTo) {
		$this->levelTo = $levelTo;

		return $this;
	}

	/**
	 * Get levelTo
	 *
	 * @return enumTournamentEventLevel 
	 */
	public function getLevelTo() {
		return $this->levelTo;
	}

}