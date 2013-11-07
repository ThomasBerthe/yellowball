<?php

namespace YB\TournamentBundle\Form;

use Symfony\Component\Form\AbstractType;
use \YB\TournamentBundle\Form\Type\ChoiceTournamentEventType;
use \YB\TournamentBundle\Form\Type\ChoiceTournamentEventCategory;
use \YB\TournamentBundle\Form\Type\ChoiceTournamentEventLevel;

/**
 * Formulaire TournamentEventType
 */
class TournamentEventType extends AbstractType {

	public function buildForm(\Symfony\Component\Form\FormBuilderInterface $oFormBuilder, array $aOptions) {
		$oFormBuilder
			->add('type', new ChoiceTournamentEventType(), array(
				'empty_value' => "Sélectionner",
				'label' => "Type d'épreuve"
			))
			->add('category', new ChoiceTournamentEventCategory(), array(
				'empty_value' => 'Sélectionner',
				'label' => 'Catégorie'
			))
			->add('levelFrom', new ChoiceTournamentEventLevel(), array(
				'empty_value' => 'Sélectionner',
				'label' => ''
			))
			->add('levelTo', new ChoiceTournamentEventLevel(), array(
				'empty_value' => 'Sélectionner',
				'label' => ''
			))
			->add('price');
			
	}
	
	public function getName() {
		return 'yb_tournamentbundle_tournamenteventtype';
	}
}

?>
