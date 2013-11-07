<?php

namespace YB\TournamentBundle\Form;

use Symfony\Component\Form\AbstractType;

/**
 * Formulaire UmpireType
 */
class UmpireType extends AbstractType {

	public function buildForm(\Symfony\Component\Form\FormBuilderInterface $oFormBuilder, array $aOptions) {
		$oFormBuilder
			->add('lastname', 'text')
			->add('firstname', 'text')
			->add('phone', 'text')
			->add('mobilePhone', 'text')
			->add('email', 'email')
			->add('address', 'text')
			->add('zipCode', 'number')
			->add('city', 'text');
	}
	
	public function getName() {
		return 'yb_tournamentbundle_umpiretype';
	}
}

?>
