<?php
declare(strict_types=1);

use Tournament;

class Tournament extends Abstract implements Interface {

	public const READY_STATE = 0;
	public const FINISHED_STATE = 1;
	public const FAULTED_STATE = -1;

	protected array $tourPlayers = [];

	abstract protected function readFiles();

	abstract public function getMVP() : string;

	abstract protected function addGame(\Game\Abstract $game);
}
