<?php
declare(strict_types=1);

namespace Tournament;

use Interface;

abstract class Abstract implements Interface {
	protected array $tourPlayers = [];

	abstract protected function readFiles();

	abstract public function getMVP() : string;
}
