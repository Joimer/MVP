<?php
declare(strict_types=1);

namespace File\Parser;

class Basketball extends Abstract implements Interface {

	protected function parse(array $fileContents) : \Game\Interface {
		$teams = [];
		foreach ($fileContents as $line) {
			$parsedLine = $this->parseLine($line);
			list($id, $nick, $number, $teamName, $position, $scoredPoints, $rebounds, $assists) = $parsedLine;
			$score = new \Score\Basketball($position, $scoredPoints, $rebounds, $assists);
			$player = new \Player\Basketball($id, $nick, $score);
			$team = $this->getTeam($teamName);
			$team->addPlayer($player, $position, (int)$number);
		}

		$game = new \Game\Basketball($team[0], $team[1]);
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
