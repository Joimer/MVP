<?php
declare(strict_types=1);

namespace Team;

interface Interface {
	public function addPlayer(\Player\Interface $player);

	public function getPlayers() : array;

	public function getScores();

	public function hasPlayer(string $player) : bool;
}
