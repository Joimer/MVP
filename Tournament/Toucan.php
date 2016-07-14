<?php
declare(strict_types=1);

namespace Tournament;

use \Tournament;
use \Tournament\Interface;

class Toucan extends Tournament implements Interface {
	protected array $tourPlayers = [];

	protected function readFiles() {

	}

	public function getMVP() : string {

	}
}
