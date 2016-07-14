<?php
declare(strict_types=1);

use Tournament;

class Tournament extends Abstract implements Interface {
	protected array $tourPlayers = [];

	abstract protected function readFiles();

	abstract public function getMVP() : string;
}
