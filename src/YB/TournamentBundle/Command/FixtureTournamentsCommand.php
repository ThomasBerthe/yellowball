<?php
namespace YB\TournamentBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use YB\TournamentBundle\Entity\Tournament;
use YB\TournamentBundle\Entity\TournamentEvent;
use YB\TournamentBundle\Entity\Club;
use YB\TournamentBundle\Entity\Umpire;

class FixtureTournamentsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('ybtournament:fixture:tournaments');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // On récupère l'EntityManager
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
		
		// Liste des clubs
		$aClubs = array(
			'SNUC' => array('address' => null, 'zipCode' => null, 'city' => null, 'phone' => '0240404307')
		);
		
		// Liste des juges arbitres
		$aUmpires = array(
			'SNUC' => array('firstname' => 'Gérard', 'lastname' => 'TREHOLAN', 'phone' => null, 'mobilePhone' => '0661140546', 'email' => null, 'address' => '12 rue du 1er Mai', 'zipCode' => '44200', 'city' => 'Nantes')
		);
		
		// Liste des tournois à ajouter
		$aTournaments = array(
			'SNUC' => array('beginDate' => new \DateTime('2013-02-13'), 'endDate' => new \DateTime('2013-02-24'), 'prizes' => '1000€', 'paymentInformation' => 'Envoyer un chèque au juge arbitre')
		);
		
		// Liste des épreuves des tournois
		$aTournamentEvents = array(
			'SNUC' => array(
				array('type' => TournamentEvent::TYPE_SM, 'category' => TournamentEvent::CAT_SENIOR, 'levelFrom' => TournamentEvent::LVL_NC, 'levelTo' => TournamentEvent::LVL_15, 'price' => 18),
				array('type' => TournamentEvent::TYPE_SD, 'category' => TournamentEvent::CAT_SENIOR35, 'levelFrom' => TournamentEvent::LVL_NC, 'levelTo' => TournamentEvent::LVL_46, 'price' => 15.5)
			)
		);

        foreach ($aTournaments as $strClubName => $aTournament) {
			$output->writeln("Creation d'un tournoi pour le club : " . $strClubName);
			
			// Tournoi
			$oTournament = new Tournament();
			$oTournament->setBeginDate($aTournament['beginDate']);
			$oTournament->setEndDate($aTournament['endDate']);
			$oTournament->setPrizes($aTournament['prizes']);
			$oTournament->setPaymentInformation($aTournament['paymentInformation']);
			
			if (isset($aClubs[$strClubName]) && isset($aUmpires[$strClubName])) {
				// Club
				$aClub = $aClubs[$strClubName];
				$oClub = new Club();
				$oClub->setName($strClubName);
				$oClub->setAddress($aClub['address']);
				$oClub->setZipCode($aClub['zipCode']);
				$oClub->setCity($aClub['city']);
				$oClub->setPhone($aClub['phone']);
				$oTournament->setClub($oClub);
				
				// Juge arbitre
				$aUmpire = $aUmpires[$strClubName];
				$oUmpire = new Umpire();
				$oUmpire->setFirstname($aUmpire['firstname']);
				$oUmpire->setLastname($aUmpire['lastname']);
				$oUmpire->setEmail($aUmpire['email']);
				$oUmpire->setPhone($aUmpire['phone']);
				$oUmpire->setMobilePhone($aUmpire['mobilePhone']);
				$oUmpire->setAddress($aUmpire['address']);
				$oUmpire->setZipCode($aUmpire['zipCode']);
				$oUmpire->setCity($aUmpire['city']);
				$oTournament->setUmpire($oUmpire);
				
				$em->persist($oTournament);
			}
			
			// Ajout des épreuves du tournois
			if (isset($aTournamentEvents[$strClubName])) {
				foreach ($aTournamentEvents[$strClubName] as $aTournamentEvent) {
					$oTournamentEvent = new TournamentEvent();
					$oTournamentEvent->setType($aTournamentEvent['type']);
					$oTournamentEvent->setCategory($aTournamentEvent['category']);
					$oTournamentEvent->setLevelFrom($aTournamentEvent['levelFrom']);
					$oTournamentEvent->setLevelTo($aTournamentEvent['levelTo']);
					$oTournamentEvent->setPrice($aTournamentEvent['price']);
					$oTournamentEvent->setTournament($oTournament);
					$em->persist($oTournamentEvent);
				}
			}
		}

        $output->writeln('Enregistrement des tournois...');

        // On déclenche l'neregistrement
        $em->flush();

        // On retourne 0 pour dire que la commande s'est bien exécutée
        return 0;
    }
}
