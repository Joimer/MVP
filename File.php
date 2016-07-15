<?php
declare(strict_types=1);

use File;

class File implements Interface {

	public const FILES_DIR = './files';

	public static function isFile(string $name) : bool {
		return is_file($name);
	}
}
