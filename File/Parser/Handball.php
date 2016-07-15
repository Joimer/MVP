<?php
declare(strict_types=1);

namespace File\Parser;

class Handball extends Abstract implements Interface {

	protected function parse(array $fileContents) : \Game\Interface {
		$teams = [];
		foreach ($fileContents as $line) {
			$parsedLine = $this->parseLine($line);
			list($id, $nick, $number, $teamName, $position, $goalsMade, $goalsReceived) = $parsedLine;
			$score = new \Score\Handball($goalsMade, $goalsReceived);
			$player = new \Player\Handball($id, $nick, $score);
			$team = $this->getTeam($teamName);
			$team->addPlayer($player, $position, (int)$number);
		}

		$game = new \Game\Handball($team[0], $team[1]);
		$game->calculatePlayerPoints();
		return $game;
	}

	protected function getTeam(string $team) : \Team {
		if (!$teams[$team]) {
			$teams[$team] = new \Team\Handball();
		}

		return $teams[$team];
	}
}
