<?php
declare(strict_types=1);

namespace File\Parser;

class Factory {

	private $implementedParsers = [
		'BASKETBALL',
		'HANDBALL'
	];

	public static function getParser(string $name) : Interface {
		if (!in_array($name, array_keys($implementedParsers))) {
			throw new Exception('Not implemented');
		}

		if ($name === 'BASKETBALL') {
			return new Basketball();
		}

		if ($name === 'HANDBALL') {
			return new Handball();
		}
	}
}
