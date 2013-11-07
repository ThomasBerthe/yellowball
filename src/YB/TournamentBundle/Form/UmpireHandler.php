<?php

namespace YB\TournamentBundle\Form;

use Doctrine\ORM\EntityManager;
use YB\TournamentBundle\Entity\Umpire;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

/**
 * Traitement du formulaire Umpire
 */
class UmpireHandler {
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
	public function onSuccess(Umpire $oUmpire) {
		$this->em->persist($oUmpire);
		$this->em->flush();
	}
}

?>
