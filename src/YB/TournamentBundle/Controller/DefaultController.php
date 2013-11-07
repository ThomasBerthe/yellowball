<?php

namespace YB\TournamentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use YB\TournamentBundle\Entity\Tournament;
use YB\TournamentBundle\Form\TournamentType;
use YB\TournamentBundle\Form\TournamentHandler;
use JMS\SecurityExtraBundle\Annotation\Secure;

class DefaultController extends Controller
{
	/**
	 * Index
	 */
	public function indexAction()
    {
		$em = $this->get('doctrine')->getManager();
		$aTournaments = $em->getRepository('YBTournamentBundle:Tournament')->findAll();
		return $this->render('YBTournamentBundle:Tournament:index.html.twig', array('tournaments' => $aTournaments));
    }

	/**
     * Ajout d'un tournoi
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function addTournamentAction() {
		// Création du formulaire
		$oTournament = new Tournament;
		$oForm = $this->createForm(new TournamentType(), $oTournament);

		// Traitement du formulaire
		$oFormHandler = new TournamentHandler($oForm, $this->get('request'), $this->get('doctrine')->getManager());
		if ($oFormHandler->process()) {
			return $this->redirect($this->generateUrl('Home'));
		}

		return $this->render('YBTournamentBundle:Tournament:form_create.html.twig', array('form' => $oForm->createView()));
	}
}
