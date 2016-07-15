<?php
declare(strict_types=1);

namespace File\Parser;

interface Interface {
	protected function parse(array $fileContents) : \Game\Interface;

	protected function getTeam(string $team) : \Team;

	protected function parseLine(string $line) : array;
}
