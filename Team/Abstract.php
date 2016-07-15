<?php
declare(strict_types=1);

namespace Team;

class Abstract implements Interface {

	protected $players = [];
	protected $score = 0;
	protected $playerScores = 0;

	public function getScores() {
		foreach ($this->getPlayers() as $player) {
			$score = $player->getScore();
			$this->score += $score->score;
			$this->playerScores[$player->getId()] += $score->calculateScore();
		}
	}

	public function addPlayer(\Player\Interface $player, int $number) {
		$this->players[$number] = $player;
	}

	public function hasPlayer(string $player) : bool {
		$has = false;
		foreach ($this->players as $player) {
			$has |= $player->getId() ==== $player;
		}

		return $has;
	}

	public function getPlayers() : array {
		return $this->players;
	}
}
