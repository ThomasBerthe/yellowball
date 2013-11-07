<?php

namespace YB\TournamentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tournament
 *
 * @ORM\Table(name="tournament")
 * @ORM\Entity(repositoryClass="YB\TournamentBundle\Entity\Repository\TournamentRepository")
 */
class Tournament
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
	
	/**
     * @var YB\TournamentBundle\Entity\Club
	 * 
     * @ORM\ManyToOne(targetEntity="YB\TournamentBundle\Entity\Club", inversedBy="tournaments", cascade={"all"})
	 * @ORM\JoinColumn(nullable=false)
     */
    private $club;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="begin_date", type="date")
     */
    private $beginDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="date")
     */
    private $endDate;
	
	/**
     * @var YB\TournamentBundle\Entity\Umpire
	 * 
     * @ORM\ManyToOne(targetEntity="YB\TournamentBundle\Entity\Umpire", inversedBy="tournaments", cascade={"all"})
	 * @ORM\JoinColumn(nullable=true)
     */
    private $umpire;

    /**
     * @var string
     *
     * @ORM\Column(name="prizes", type="text")
     */
    private $prizes;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_information", type="text")
     */
    private $paymentInformation;
	
	/**
     * @var ArrayCollection $tournamentEvents
     *
     * @ORM\OneToMany(targetEntity="YB\TournamentBundle\Entity\TournamentEvent", mappedBy="tournament", cascade={"all"})
     */
    private $tournamentEvents;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tournamentEvents = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set beginDate
     *
     * @param \DateTime $beginDate
     * @return Tournament
     */
    public function setBeginDate($beginDate)
    {
        $this->beginDate = $beginDate;
    
        return $this;
    }

    /**
     * Get beginDate
     *
     * @return \DateTime 
     */
    public function getBeginDate()
    {
        return $this->beginDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Tournament
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    
        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set prizes
     *
     * @param string $prizes
     * @return Tournament
     */
    public function setPrizes($prizes)
    {
        $this->prizes = $prizes;
    
        return $this;
    }

    /**
     * Get prizes
     *
     * @return string 
     */
    public function getPrizes()
    {
        return $this->prizes;
    }

    /**
     * Set paymentInformation
     *
     * @param string $paymentInformation
     * @return Tournament
     */
    public function setPaymentInformation($paymentInformation)
    {
        $this->paymentInformation = $paymentInformation;
    
        return $this;
    }

    /**
     * Get paymentInformation
     *
     * @return string 
     */
    public function getPaymentInformation()
    {
        return $this->paymentInformation;
    }

    /**
     * Set club
     *
     * @param \YB\TournamentBundle\Entity\Club $club
     * @return Tournament
     */
    public function setClub(\YB\TournamentBundle\Entity\Club $club)
    {
        $this->club = $club;
    
        return $this;
    }

    /**
     * Get club
     *
     * @return \YB\TournamentBundle\Entity\Club 
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * Set umpire
     *
     * @param \YB\TournamentBundle\Entity\Umpire $umpire
     * @return Tournament
     */
    public function setUmpire(\YB\TournamentBundle\Entity\Umpire $umpire = null)
    {
        $this->umpire = $umpire;
    
        return $this;
    }

    /**
     * Get umpire
     *
     * @return \YB\TournamentBundle\Entity\Umpire 
     */
    public function getUmpire()
    {
        return $this->umpire;
    }

    /**
     * Add tournamentEvents
     *
     * @param \YB\TournamentBundle\Entity\TournamentEvent $tournamentEvent
     * @return Tournament
     */
    public function addTournamentEvent(\YB\TournamentBundle\Entity\TournamentEvent $tournamentEvent)
    {
        $tournamentEvent->setTournament($this);
		$this->tournamentEvents[] = $tournamentEvent;
    
        return $this;
    }

    /**
     * Remove tournamentEvents
     *
     * @param \YB\TournamentBundle\Entity\TournamentEvent $tournamentEvent
     */
    public function removeTournamentEvent(\YB\TournamentBundle\Entity\TournamentEvent $tournamentEvent)
    {
        $this->tournamentEvents->removeElement($tournamentEvent);
    }

    /**
     * Get tournamentEvents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTournamentEvents()
    {
        return $this->tournamentEvents;
    }
}