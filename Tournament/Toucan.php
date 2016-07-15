<?php
declare(strict_types=1);

namespace Tournament;

use File\Parser;
use Tournament;

class Toucan extends Abstract implements Interface {

	private $state = Abstract::READY_STATE;

	protected $tourPlayers = [];
	protected $games = [];
	protected $playerRanks = [];

	protected function readFiles() {
		try {
			if ($this->state !== Abstract::READY_STATE) {
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
			$this->state = Abstract::FAULTED_STATE;
		}
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
		// This can be done with a simple sort(), but I'm showcasing here spaceship operator.
		uasort($this->playerRanks, function ($a, $b) {
			return $a <=> $b;
		});
	}

	protected function topPlayerName() : string {
		return reset(array_keys($this->playerRanks));
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
