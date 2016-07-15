<?php
declare(strict_types=1);

namespace Game;

class Basketball extends \Game implements \Game\Interface {

	public const GUARD = 'G';
	public const FORWARD = 'F';
	public const CENTER = 'C';

	protected $teamA;
	protected $teamB;
	protected $winner;
	protected $playerPoints = [];

	public __construct(\Team $teamA, \Team $teamB) {
		$this->teamA = $teamA;
		$this->teamB = $teamB;
	}

	protected function getWinner() : \Team {
		$teamA->getScores();
		$teamB->getScores();
		if ($teamA->goalsMade > $teamB->goalsMade) {
			return $teamA;
		}
		return $teamB;
	}
}
