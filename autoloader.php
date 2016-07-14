<?php
declare(strict_types=1);

spl_autoload_register(function (string $class) {
	$route = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	if (!file_exists($route)) {
		header('HTTP/1.0 404 Not Found');
		debug_print_backtrace();
		die();
	}

	require_once $class . '.php';
});
