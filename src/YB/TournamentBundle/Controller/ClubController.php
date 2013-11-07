<?php

namespace YB\TournamentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use YB\TournamentBundle\Entity\Club;
use YB\TournamentBundle\Form\ClubType;
use YB\TournamentBundle\Form\ClubHandler;
use JMS\SecurityExtraBundle\Annotation\Secure;

class ClubController extends Controller
{
	/**
	 * Index
	 */
	public function indexAction()
    {
		$em = $this->get('doctrine')->getManager();
		$aClubs = $em->getRepository('YBTournamentBundle:Club')->findAll();
		return $this->render('YBTournamentBundle:Club:index.html.twig', array('clubs' => $aClubs));
    }

	/**
     * Ajout d'un club
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function addClubAction() {
		// Création du formulaire
		$oClub = new Club;
		$oForm = $this->createForm(new ClubType(), $oClub);

		// Traitement du formulaire
		$oFormHandler = new ClubHandler($oForm, $this->get('request'), $this->getDoctrine()->getEntityManager());
		if ($oFormHandler->process()) {
			return $this->redirect($this->generateUrl('Clubs'));
		}

		return $this->render('YBTournamentBundle:Club:form_create.html.twig', array('form' => $oForm->createView()));
	}
}
