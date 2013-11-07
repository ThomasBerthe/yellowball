<?php

namespace YB\TournamentBundle\Form;

use Symfony\Component\Form\AbstractType;

/**
 * Formulaire ClubType
 */
class ClubType extends AbstractType {

	public function buildForm(\Symfony\Component\Form\FormBuilderInterface $oFormBuilder, array $aOptions) {
		$oFormBuilder
			->add('name', 'text')
			->add('address', 'text')
			->add('zipCode', 'number')
			->add('city', 'text')
			->add('phone', 'text');
	}
	
	public function getName() {
		return 'yb_tournamentbundle_clubtype';
	}
}

?>
