<?php

namespace YB\TournamentBundle\Entity\Type;
use YB\TournamentBundle\Entity\TournamentEvent;

class EnumTournamentEventType extends EnumType {

	protected $name = 'enumTournamentEventType';
	protected $values = array(
		TournamentEvent::TYPE_SM,
		TournamentEvent::TYPE_SD,
		TournamentEvent::TYPE_DM,
		TournamentEvent::TYPE_DD,
		TournamentEvent::TYPE_DX	
	);
	
}