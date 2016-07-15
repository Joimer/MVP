<?php
declare(strict_types=1);

namespace Team;

class Abstract implements Interface {
	protected $players = [];

	abstract public function addPlayer(\Player\Interface $player, string $position, int $number);

	abstract public function getScores();

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
