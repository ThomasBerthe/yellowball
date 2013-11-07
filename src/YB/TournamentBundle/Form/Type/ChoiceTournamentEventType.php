<?php

namespace YB\TournamentBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use YB\TournamentBundle\Entity\TournamentEvent;

class ChoiceTournamentEventType extends AbstractType {

	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'choices' => array(
				TournamentEvent::TYPE_SM => 'Simple messieur',
				TournamentEvent::TYPE_SD => 'Simple dame',
				TournamentEvent::TYPE_DM => 'Double messieur',
				TournamentEvent::TYPE_DD => 'Double dame',
				TournamentEvent::TYPE_DX => 'Double mixte'
			)
		));
	}

	public function getParent() {
		return 'choice';
	}

	public function getName() {
		return 'level';
	}

}