<?php
declare(strict_types=1);

namespace File\Parser;

abstract class Abstract implements Interface {

	abstract protected function parse(array $fileContents) : \Game\Interface;

	abstract protected function getTeam(string $team) : \Team;

	protected function parseLine(string $line) : array {
		return explode(';', trim($line));
	}
}
