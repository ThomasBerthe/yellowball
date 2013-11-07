<?php

namespace YB\TournamentBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use YB\TournamentBundle\Entity\TournamentEvent;

class ChoiceTournamentEventCategory extends AbstractType {

	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'choices' => array(
				TournamentEvent::CAT_910 => 'CAT_910',
				TournamentEvent::CAT_1112 => 'CAT_1112',
				TournamentEvent::CAT_1314 => 'CAT_1314',
				TournamentEvent::CAT_1516 => 'CAT_1516',
				TournamentEvent::CAT_1718 => 'CAT_1718',
				TournamentEvent::CAT_SENIOR => 'CAT_SENIOR',
				TournamentEvent::CAT_SENIOR35 => 'CAT_SENIOR35',
				TournamentEvent::CAT_SENIOR45 => 'CAT_SENIOR45',
				TournamentEvent::CAT_SENIOR55 => 'CAT_SENIOR55'
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