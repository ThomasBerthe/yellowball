<?php

namespace YB\TournamentBundle\Entity\Type;
use YB\TournamentBundle\Entity\TournamentEvent;

class EnumTournamentEventLevel extends EnumType {

	protected $name = 'enumTournamentEventLevel';
	protected $values = array(
		TournamentEvent::LVL_NC,
		TournamentEvent::LVL_40,
		TournamentEvent::LVL_305,
		TournamentEvent::LVL_304,
		TournamentEvent::LVL_303,
		TournamentEvent::LVL_302,
		TournamentEvent::LVL_301,
		TournamentEvent::LVL_30,
		TournamentEvent::LVL_155,
		TournamentEvent::LVL_154,
		TournamentEvent::LVL_153,
		TournamentEvent::LVL_152,
		TournamentEvent::LVL_151,
		TournamentEvent::LVL_15,
		TournamentEvent::LVL_56,
		TournamentEvent::LVL_46,
		TournamentEvent::LVL_36,
		TournamentEvent::LVL_26,
		TournamentEvent::LVL_16,
		TournamentEvent::LVL_0,
		TournamentEvent::LVL_N26,
		TournamentEvent::LVL_N46,
		TournamentEvent::LVL_N15,
		TournamentEvent::LVL_N30
	);

}