<?php
declare(strict_types=1);

namespace File\Parser;

interface Interface {
	protected function parse(array $fileContents) : \Game\Interface;
}
