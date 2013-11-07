<?php

namespace YB\TournamentBundle\Entity\Type;
use YB\TournamentBundle\Entity\TournamentEvent;

class EnumTournamentEventCategory extends EnumType {

	protected $name = 'enumTournamentEventCategory';
	protected $values = array(
		TournamentEvent::CAT_910,
		TournamentEvent::CAT_1112,
		TournamentEvent::CAT_1314,
		TournamentEvent::CAT_1516,
		TournamentEvent::CAT_1718,
		TournamentEvent::CAT_SENIOR,
		TournamentEvent::CAT_SENIOR35,
		TournamentEvent::CAT_SENIOR45,
		TournamentEvent::CAT_SENIOR55	
	);

}