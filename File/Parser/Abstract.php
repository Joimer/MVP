<?php
declare(strict_types=1);

namespace File\Parser;

abstract class Abstract implements Interface {
	abstract protected function parse(array $fileContents) : \Game\Interface;
}
