<?php
declare(strict_types=1);

namespace Game;

abstract class Abstract {

	public const ADDITIONAL_WINNING_POINTS = 10;

	protected $playerPoints = [];

	protected function getWinner() : \Team {
		$teamA->getScores();
		$teamB->getScores();
		if ($teamA->goalsMade > $teamB->goalsMade) {
			return $teamA;
		}
		return $teamB;
	}

	public function getPlayerPoints() : array {
		return $this->playerPoints;
	}

	protected function calculatePlayerPoints() {
		$winner = $this->getWinner();
		foreach ($this->playerPoints as $player=>&$points) {
			if ($winner->hasPlayer($player)) {
				$points += \Game\Abstract::ADDITIONAL_WINNING_POINTS;
			}
		}
	}
}
