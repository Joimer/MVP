<?php
declare(strict_types=1);

namespace Game;

interface Interface {
	public function getPlayerPoints() : array;

	protected function getWinner() : \Team;
}
