<?php
declare(strict_types=1);
require_once('autoloader.php');

$tour = new \Tournament\Toucan();
$tour->run();
$mvp = $tour->getMVP();
echo $mvp;
