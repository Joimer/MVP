<?php
declare(strict_types=1);

namespace Tournament;

interface Interface {
	protected array $tourPlayers;

	protected function readFiles();

	public function getMVP() : string;
}
