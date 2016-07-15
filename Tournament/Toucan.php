<?php
declare(strict_types=1);

namespace Tournament;

use File\Parser;
use Tournament;

class Toucan extends Tournament implements Interface {

	private $state = Tournament::READY_STATE;

	protected $tourPlayers = [];
	protected $games = [];
	protected $playerRanks = [];

	protected function readFiles() {
		try {
			if ($this->state !== Tournament::READY_STATE) {
				throw new Exception('Not in proper state.');
			}

			foreach (scandir(File::FILES_DIR) as $file) {
				if (File::isFile($file)) {
					$contents = explode("\n", file_get_contents($file));
					$parser = Factory::getParser(trim($contents[0]));
					array_shift($contents);
					$this->addGame($parser->parse($contents));
				}
			}
		} catch (Throwable $e) {
			$this->state = Tournament::FAULTED_STATE;
		}
	}

	protected function addGame(\Game\Abstract $game) {
		$this->games[] = $game;
	}

	protected function calculateMVP() {
		foreach ($this->games as $game) {
			foreach ($game->getPlayerPoints() as $player=>$points) {
				if (!$this->playerRanks[$player]) {
					$this->playerRanks[$player] = 0;
				}
				$this->playerRanks[$player] += $points;
			}
		}
	}

	protected function sort() {

	}

	protected function topPlayerName() : string {

	}

	protected function MVP() : string{
		if ($this->state === Tournament::READY_STATE) {
			return "MVP still to be calculated.";
		}

		if ($this->state === Tournament::FAULTED_STATE) {
			return "Could not calculate MVP.";
		}

		if ($this->state === Tournament::FINISHED_STATE) {
			return "The MVP is: " . $this->topPlayerName();
		}
	}

	public function getMVP() : string {
		$this->readFiles();
		$this->calculateMVP();
		$this->sort();
		return $this->MVP();
	}
}
