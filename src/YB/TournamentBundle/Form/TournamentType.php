<?php

namespace YB\TournamentBundle\Form;

use Symfony\Component\Form\AbstractType;
use YB\TournamentBundle\Form\TournamentEventType;

/**
 * Formulaire TournamentType
 */
class TournamentType extends AbstractType {

	public function buildForm(\Symfony\Component\Form\FormBuilderInterface $oFormBuilder, array $aOptions) {
		$oFormBuilder
			->add('beginDate', 'date')
			->add('endDate', 'date')
			->add('prizes', 'textarea')
			->add('paymentInformation', 'textarea')
			->add('umpire', 'entity', array(
				'class' => 'YBTournamentBundle:Umpire'
			))
			->add('club', 'entity', array(
				'class' => 'YBTournamentBundle:Club'
			))
			->add('tournamentEvents', 'collection', array(
				'type' => new TournamentEventType,
				'allow_add' => true,
				'allow_delete' => true,
				'by_reference' => false,
				'options' => array('data_class' => 'YB\TournamentBundle\Entity\TournamentEvent')
			));
	}
	
	public function getName() {
		return 'yb_tournamentbundle_tournamenttype';
	}
}

?>
