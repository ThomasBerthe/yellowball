<?php

namespace YB\TournamentBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use YB\TournamentBundle\Entity\TournamentEvent;

class ChoiceTournamentEventLevel extends AbstractType {

	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'choices' => array(
				TournamentEvent::LVL_NC => 'Non classé',
				TournamentEvent::LVL_40 => '40',
				TournamentEvent::LVL_305 => '30/5',
				TournamentEvent::LVL_304 => '30/4',
				TournamentEvent::LVL_303 => '30/3',
				TournamentEvent::LVL_302 => '30/2',
				TournamentEvent::LVL_301 => '30/1',
				TournamentEvent::LVL_30 => '30',
				TournamentEvent::LVL_155 => '15/5',
				TournamentEvent::LVL_154 => '15/4',
				TournamentEvent::LVL_153 => '15/3',
				TournamentEvent::LVL_152 => '15/2',
				TournamentEvent::LVL_151 => '15/1',
				TournamentEvent::LVL_15 => '15',
				TournamentEvent::LVL_56 => '5/6',
				TournamentEvent::LVL_46 => '4/6',
				TournamentEvent::LVL_36 => '3/6',
				TournamentEvent::LVL_26 => '2/6',
				TournamentEvent::LVL_16 => '1/6',
				TournamentEvent::LVL_0 => '0',
				TournamentEvent::LVL_N26 => '-2/6',
				TournamentEvent::LVL_N46 => '-4/6',
				TournamentEvent::LVL_N15 => '-15',
				TournamentEvent::LVL_N30 => '-30'
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