<?php

namespace YB\TournamentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use YB\TournamentBundle\Entity\Umpire;
use YB\TournamentBundle\Form\UmpireType;
use YB\TournamentBundle\Form\UmpireHandler;
use JMS\SecurityExtraBundle\Annotation\Secure;

class UmpireController extends Controller
{
	/**
	 * Index
	 */
	public function indexAction()
    {
		$em = $this->get('doctrine')->getManager();
		$aUmpires = $em->getRepository('YBTournamentBundle:Umpire')->findAll();
		return $this->render('YBTournamentBundle:Umpire:index.html.twig', array('umpires' => $aUmpires));
    }

	/**
     * Ajout d'un juge arbitre
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function addUmpireAction() {
		// Création du formulaire
		$oUmpire = new Umpire;
		$oForm = $this->createForm(new UmpireType(), $oUmpire);

		// Traitement du formulaire
		$oFormHandler = new UmpireHandler($oForm, $this->get('request'), $this->getDoctrine()->getEntityManager());
		if ($oFormHandler->process()) {
			return $this->redirect($this->generateUrl('Umpires'));
		}

		return $this->render('YBTournamentBundle:Umpire:form_create.html.twig', array('form' => $oForm->createView()));
	}
}
