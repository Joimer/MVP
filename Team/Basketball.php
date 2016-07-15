<?php
declare(strict_types=1);

namespace Team;

class Basketball extends Abstract implements Interface {

	protected $players = [];
	protected $goalsMade = 0;
	protected $playerScores = 0;

	public function addPlayer(\Player\Interface $player, string $position, int $number) {
		if ($position !== self::GOALKEEPER_POSITION && $position !== self::FIELD_PLAYER_POSITION) {
			throw new Exception('Wrong position.');
		}

		$this->players[$number] = $player;
	}

	public function getScores() {
		foreach ($this->getPlayers() as $player) {
			$score = $player->getScore();
			$this->goalsMade += $score->goalsMade;
			$this->playerScores[$player->getId()] += $score->calculateScore();
		}
	}
}
