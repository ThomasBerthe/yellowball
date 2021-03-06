<?php

namespace YB\TournamentBundle\Form;

use Doctrine\ORM\EntityManager;
use YB\TournamentBundle\Entity\Tournament;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

/**
 * Traitement du formulaire Tournament
 */
class TournamentHandler {
	protected $form;
	protected $request;
	protected $em;
	
	/**
	 * Constructeur
	 * @param Form $oForm
	 * @param Request $oRequest
	 * @param EntityManager $em
	 */
	public function __construct(Form $oForm, Request $oRequest, EntityManager $em) {
		$this->form = $oForm;
		$this->request = $oRequest;
		$this->em = $em;
	}
	
	/**
	 * Traitement du formulaire
	 * @return boolean
	 */
	public function process() {
		if ($this->request->getMethod() == 'POST') {
			$this->form->bindRequest($this->request);
			if ($this->form->isValid()) {
				$this->onSuccess($this->form->getData());
				return true;
			}
		}
	}
	
	/**
	 * En cas de succès
	 */
	public function onSuccess(Tournament $oTournament) {
		$this->em->persist($oTournament);
		$this->em->flush();
	}
}

?>
