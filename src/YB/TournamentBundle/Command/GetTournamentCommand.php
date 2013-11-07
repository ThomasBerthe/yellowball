<?php
namespace YB\TournamentBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use YB\TournamentBundle\Entity\Tournament;
use YB\TournamentBundle\Entity\TournamentEvent;
use YB\TournamentBundle\Entity\Club;
use YB\TournamentBundle\Entity\Umpire;

class GetTournamentCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('ybtournament:script:gettournament');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // On récupère l'EntityManager
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
		
		// Accès au site de la fft
		$url = "http://www.ei.applipub-fft.fr/eipublic/competition.do?dispatch=afficher&hoi_iid=82023523";
		$html = file_get_contents($url);
		$html = preg_replace('$<!DOCTYPE(?:.|\n|\r)+?<html>$', '<html>', $html);
		//echo htmlentities($html);
		
		$doc = new \DOMDocument();
		@$doc->loadHTML($html);
		//echo $doc->saveHTML();
		$xpath = new \DOMXpath($doc);
		$elements = $xpath->query("//table[@class='form']/tr");
		
		$aTournament = array(
			'beginDate' => '',
			'endDate' => '',
			'paymentInformation' => '',
			'prizes' => '',
			'club' => array(
				'address' => '',
				'city' => '',
				'name' => '',
				'phone' => '',
				'zipCode' => ''
			),
			'umpire' => array(
				'address' => '',
				'city' => '',
				'email' => '',
				'firstname' => '',
				'lastname' => '',
				'mobilePhone' => '',
				'phone' => '',
				'zipCode' => ''
			)
		);
		
		$j = 0;
		foreach ($elements as $element) {
			$nodes = $element->childNodes;
			$i = 0;
			$nodeValueBuffer = '';
			foreach ($nodes as $node) {
				if ($i == 0) {
					echo $node->nodeValue;
					$nodeValueBuffer = $node->nodeValue;
				} else if ($i == 2) {
					$nodeValue = $node->nodeValue;
					
					if (!empty($nodeValue)) {
						switch ($nodeValueBuffer) {
							case 'Nom' : echo $nodeValue; break;
							case 'Code' : echo $nodeValue; break;
							case 'Année sportive' : echo $nodeValue; break;
							case 'Début / Fin' : 
								try {
									list($strDateBegin, $strDateEnd) = explode(' / ', $nodeValue);
									$aTournament['beginDate'] = new \DateTime(str_replace('/', '-', $strDateBegin));
									$aTournament['endDate'] = new \DateTime(str_replace('/', '-', $strDateEnd));
								} catch (\Exception $e) {
									continue;
								}
							break;
							case 'Ligue' : echo $nodeValue; break;
							case 'Département' : echo $nodeValue; break;
							case 'Club organisteur' : echo $nodeValue; break;
							case 'Prix en espèces / en lots' : echo $nodeValue; break;
							case 'Publication résultats' : echo $nodeValue; break;
							case 'Programmes consultables ?' : echo $nodeValue; break;
							case 'Inscription en ligne' : echo $nodeValue; break;
							case 'Responsable' : echo $nodeValue; break;
							case 'Adresse' : if ($j > 14) echo $nodeValue; else echo $nodeValue; break;
							case 'Tél. bureau' : echo $nodeValue; break;
							case 'Tél. domicile' : echo $nodeValue; break;
							case 'Tél. mobile' : echo $nodeValue; break;
							case 'Fax.' : echo $nodeValue; break;
							case 'Email' : echo $nodeValue; break;
							case 'Surfaces' : echo $nodeValue; break;
							case 'Club house' : echo $nodeValue; break;
							case 'Vestiaire' : echo $nodeValue; break;
						}
					}
					
					$nodeValueBuffer = '';
				}
				$i++;
			}
			$j++;
		}
		
		var_dump($aTournament);
		exit();
		
		$oClub = new \YB\TournamentBundle\Entity\Club();
		$oClub->setAddress($aTournament['club']['address']);
		$oClub->setCity($aTournament['club']['city']);
		$oClub->setName($aTournament['club']['name']);
		$oClub->setPhone($aTournament['club']['phone']);
		$oClub->setZipCode($aTournament['club']['zipCode']);
		$em->persist($oClub);
		
		$oUmpire = new \YB\TournamentBundle\Entity\Umpire();
		$oUmpire->setAddress($aTournament['umpire']['address']);
		$oUmpire->setCity($aTournament['umpire']['city']);
		$oUmpire->setEmail($aTournament['umpire']['email']);
		$oUmpire->setFirstname($aTournament['umpire']['firstname']);
		$oUmpire->setLastname($aTournament['umpire']['lastname']);
		$oUmpire->setMobilePhone($aTournament['umpire']['mobilePhone']);
		$oUmpire->setPhone($aTournament['umpire']['phone']);
		$oUmpire->setZipCode($aTournament['umpire']['zipCode']);
		$em->persist($oUmpire);
		
		$oTournament = new Tournament();
		$oTournament->setBeginDate($aTournament['beginDate']);
		$oTournament->setEndDate($aTournament['endDate']);
		$oTournament->setClub($oClub);
		$oTournament->setPaymentInformation($aTournament['paymentInformation']);
		$oTournament->setPrizes($aTournament['prizes']);
		$oTournament->setUmpire($oUmpire);
		$em->persist($oTournament);
		//$em->flush();
		
		/*$elements = $xpath->query("//table[@class='L1']/tr");
		foreach ($elements as $element) {
			echo "<br/>[". $element->nodeName. "]";

			$nodes = $element->childNodes;
			foreach ($nodes as $node) {
				if ($i == 0) {
					$nodeValue = $node->nodeValue;
					switch ($nodeValue) {
						case 'Nom':
							
						break;
					}
				} else if ($i == 2) {
					
				}
				$i++;
			}
		}
		//var_dump($elements);*/

        $output->writeln('Enregistrement des tournois...');

        // On déclenche l'neregistrement
        $em->flush();

        // On retourne 0 pour dire que la commande s'est bien exécutée
        return 0;
    }
}
