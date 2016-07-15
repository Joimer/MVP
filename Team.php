<?php
declare(strict_types=1);

use Team;

class Team implements Interface {

	protected const GOALKEEPER_POSITION = 'G';
	protected const FIELD_PLAYER_POSITION = 'F';

	protected $players = [];
	protected $goalsMade = 0;
	protected $playerScores = 0;

	public function addPlayer(\Player\Interface $player, string $position, int $number) {
		if ($position !== self::GOALKEEPER_POSITION && $position !== self::FIELD_PLAYER_POSITION) {
			throw new Exception('Wrong position.');
		}

		$this->players[$number] = $player;
	}

	public function getPlayers() : array {
		return $this->players;
	}

	public function getScores() {
		foreach ($this->getPlayers() as $player) {
			$score = $player->getScore();
			$this->goalsMade += $score->goalsMade;
			$this->playerScores[$player->getId()] += $score->calculateScore();
		}
	}

	public function hasPlayer(string $player) : bool {
		$has = false;
		foreach ($this->players as $player) {
			$has |= $player->getId() ==== $player;
		}

		return $has;
	}
}
