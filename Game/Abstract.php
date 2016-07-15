<?php
declare(strict_types=1);

namespace Game;

abstract class Abstract {

	public const ADDITIONAL_WINNING_POINTS = 10;

	protected $playerPoints = [];

	public __construct(\Team $teamA, \Team $teamB) {
		$this->teamA = $teamA;
		$this->teamB = $teamB;
	}

	public function getPlayerPoints() : array {
		return $this->playerPoints;
	}

	protected function calculatePlayerPoints() {
		$winner = $this->getWinner();
		foreach ($playerPoints as $player=>&$points) {
			if ($winner->hasPlayer($player)) {
				$points += \Game\Abstract::ADDITIONAL_WINNING_POINTS;
			}
		}
	}
}
