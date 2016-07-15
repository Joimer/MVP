<?php
declare(strict_types=1);

namespace Tournament;

use Interface;

abstract class Abstract implements Interface {

	public const READY_STATE = 0;
	public const FINISHED_STATE = 1;
	public const FAULTED_STATE = -1;

	protected array $tourPlayers = [];

	abstract protected function readFiles();

	abstract public function getMVP() : string;

	protected function addGame(\Game\Abstract $game) {
		$this->games[] = $game;
	}
}
